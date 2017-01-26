<?php

namespace Scool\Timetables\Http\Controllers;

use Illuminate\Http\Request;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Scool\Timetables\Http\ControllersHttp\Requests\DesiratumCreateRequest;
use Scool\Timetables\Http\ControllersHttp\Requests\DesiratumUpdateRequest;
use Scool\Timetables\Repositories\DesiratumRepository;
use Scool\Timetables\Validators\DesiratumValidator;


class DesirataController extends Controller
{

    /**
     * @var DesiratumRepository
     */
    protected $repository;

    /**
     * @var DesiratumValidator
     */
    protected $validator;

    public function __construct(DesiratumRepository $repository, DesiratumValidator $validator)
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
        $desirata = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $desirata,
            ]);
        }

        return view('desirata.index', compact('desirata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DesiratumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DesiratumCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $desiratum = $this->repository->create($request->all());

            $response = [
                'message' => 'Desiratum created.',
                'data'    => $desiratum->toArray(),
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
        $desiratum = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $desiratum,
            ]);
        }

        return view('desirata.show', compact('desiratum'));
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

        $desiratum = $this->repository->find($id);

        return view('desirata.edit', compact('desiratum'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DesiratumUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(DesiratumUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $desiratum = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Desiratum updated.',
                'data'    => $desiratum->toArray(),
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
                'message' => 'Desiratum deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Desiratum deleted.');
    }
}
