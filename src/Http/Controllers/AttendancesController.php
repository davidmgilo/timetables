<?php

namespace Scool\Timetables\Http\Controllers;

//use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Scool\Timetables\Http\Requests\AttendanceCreateRequest;
use Scool\Timetables\Http\Requests\AttendanceUpdateRequest;
use Scool\Timetables\Repositories\AttendanceRepository;
use Scool\Timetables\Validators\AttendanceValidator;

class AttendancesController extends Controller
{

    /**
     * @var AttendanceRepository
     */
    protected $repository;

    /**
     * @var AttendanceValidator
     */
    protected $validator;

    public function __construct(AttendanceRepository $repository, AttendanceValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $attendances = $this->repository->all();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $attendances,
            ]);
        }

        return view('attendances.index', compact('attendances'));
    }

    //TODO : create

    /**
     * Store a newly created resource in storage.
     *
     * @param  AttendanceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $attendance = $this->repository->create($request->all());

            $response = [
                'message' => 'Attendance created.',
                'data'    => $attendance->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $attendance,
            ]);
        }

        return view('attendances.show', compact('attendance'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = $this->repository->find($id);

        return view('attendances.edit', compact('attendance'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AttendanceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(AttendanceUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $attendance = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Attendance updated.',
                'data'    => $attendance->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Attendance deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Attendance deleted.');
    }
}
