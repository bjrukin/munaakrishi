<?php

namespace App\Services\Admin;

use App\Models\Faq;

class FaqService
{
    public function list($q)
    {
        try {
            $data['q'] = $q;
            $query = Faq::select('*');
            if ($q) {
                $query->where(function ($sq) use ($q) {
                    $sq->where('question', 'LIKE', '%' . $q . '%')
                       ->orWhere('nepali_question', 'LIKE', '%' . $q . '%')
                       ->orWhere('answer', 'LIKE', '%' . $q . '%');
                });
            }
            $data['faqs'] = $query->orderBy('order', 'asc')->get();
            $data['count'] = 1;
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function status($request)
    {
        try {
            Faq::where('id', $request->id)->update([
                $request->field_name => $request->val,
            ]);
            $msg = ($request->val == 1) ? 'FAQ enabled successfully.' : 'FAQ disabled successfully.';
            return response()->json(['message' => $msg, 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function order($request)
    {
        try {
            Faq::where('id', $request->id)->update([$request->order_field_name => $request->order]);
            return response()->json(['message' => 'Order updated successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store($request)
    {
        try {
            if (!empty($request['id'])) {
                $faq = Faq::findOrFail($request['id']);
                $response['message'] = 'FAQ updated successfully.';
                $response['status'] = 202;
            } else {
                $faq = new Faq();
                $faq->order = getMax('faqs', 'order') ?: (Faq::count() + 1);
                $response['message'] = 'FAQ created successfully.';
                $response['status'] = 201;
            }

            $faq->question = $request['question'];
            $faq->nepali_question = $request['nepali_question'] ?? null;
            $faq->answer = $request['answer'];
            $faq->save();

            $response['error'] = null;
            return response()->json($response, $response['status']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function delete($request)
    {
        try {
            Faq::where('id', $request->id)->delete();
            return response()->json(['message' => 'FAQ deleted successfully.', 'error' => null, 'status' => 200], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
