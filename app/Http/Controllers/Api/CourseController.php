<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function getCourses( $request)
    {

        try {
            $query = Course::orderBy('created_at', 'desc')
            ->with('category', 'age', 'user');
            if ($request['categories'] != '') {
                $query->whereIn('category_id', $request['categories']); }
            if ($request['ages'] != '') {
                $query->whereIn('age_id', $request['ages']);
            }
            if ($request['search'] != '') {
                $query->where('title', 'LIKE', '%' . $request['search'] . '%');
            }

            if (count($query->get()) > 0) {
                return response()->json(['code' => 200, 'message' => 'Cursos encontrados', 'data' => $query->get()], 200);
            } else {
                return response()->json(['code' => 400, 'message' => 'No se encontraron cursos', 'data' => []], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['code' => 500, 'message' => 'Error interno del servidor', 'data' => ['error', $e]], 500);
        }
    }
}