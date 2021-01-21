<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    public function index(){
        return view('board.index');
    }

    public function submit(Request $request){
        $data = $request->only(array_keys($this->getParams()));
        $validator = Validator::make($data, $this->getParams());

        if($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }else{
            $activeUser = User::with('game')->where('name', $data['userSession'])->first();
            $activeGame = Game::find($activeUser->game->id);
            $activeWord = Word::where('name', $data['trueAnswer'])->first();

            if($activeWord->name === $data['userAnswer']){
                $point = $activeGame->total_point + 1;
                $is_true = true;
                $realPoint = 1;
            }else{
                $point = $activeGame->total_point - 1;
                $is_true = false;
                $realPoint = -1;
            }

            $activeGame->update([
                'total_point' => $point
            ]);

            $result = $activeGame->result()->create([
                'word_id' => $activeWord->id,
                'answer' => $data['userAnswer'],
                'is_true' => $is_true,
                'point' => $realPoint
            ]);

            return response()->json([
                'data' => $result,
                'point' => $point,
                'word' => $this->getShuffledWord()
            ], 200);
        }
    }

    private function getShuffledWord(){
        $initialWord =  Word::inRandomOrder()->first();
        return [
            'answer' => $initialWord,
            'shuffledWord' => str_shuffle($initialWord->name)
        ];
    }

    private function getParams(){
        return [
            'userAnswer' => 'required',
            'shuffledWord' => 'required',
            'trueAnswer' => 'required',
            'userSession' => 'required'
        ];
    }
}
