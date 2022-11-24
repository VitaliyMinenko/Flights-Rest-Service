<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\FlightRequest;

class FlightsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAction(Request $request)
    {
        $res = Flight::paginate(config('app.pagination'));
        return response()->json([
            'status' => 'ok',
            'data' => $res,
        ], Response::HTTP_OK);
    }

    /**
     * @param FlightRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postAction(FlightRequest $request)
    {
        $flight = new Flight;
        if ($flight->fill($request->validated())->save()) {
            return response()->json([
                'status' => 'ok',
                'data' => $flight,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bad request.',
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param FlightRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function putAction(FlightRequest $request, $id)
    {
        $flight = Flight::find($id);
        if (!empty($flight) && $flight->fill($request->validated())->save()) {
            return response()->json([
                'status' => 'ok',
                'data' => $flight,
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Flight with id ' . $id . ' not found.',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
