@extends('layout.master')
@section('content')
    <div class="o-page__card">
        <div class="c-card c-card--center">

            <h2 class="u-mb-medium">Shuffled Word!</h2>
            <div >
                <h5 class="u-mb-medium">Your point: <span id="point">{{ $point ?? '' }}</span></h5>
            </div>
            <div class="row" id="notificationRow">

            </div>
            <input type="hidden" name="session" id="session" value="{{ \Illuminate\Support\Facades\Session::get('user') }}">
                <div class="c-field">
                    <label class="c-field__label u-text-center">Shuffled Word</label>
                    <input id="shuffledWord" class="c-input u-mb-small" type="text" required value="{{ $data['shuffledWord'] ?? '' }}">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label u-text-center">True Word</label>
                    <label class="c-field__label u-text-center" id="trueWord">({{ $data['answer']->name ?? '' }})</label>
                    <input type="hidden" value="{{ $data['answer']->name ?? '' }}" id="answer">
                    <input class="c-input" type="text" placeholder="Input your guess of true word" required id="userAnswer">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" onclick="submitAnswer()">Submit</button>
        </div>
    </div>
{{--    <div class="o-page o-page--center">--}}
{{--    --}}
{{--    </div>--}}
@stop
@section('js')
    <script>
        function submitAnswer(){
            var shuffledWord = $('#shuffledWord').val();
            var trueAnswer = $('#answer').val();
            var userAnswer = $('#userAnswer').val();
            var userSession = $('#session').val();

            $.ajax({
                type: 'POST',
                url: '{{ route('user_submit') }}',
                data: {
                    'shuffledWord' : shuffledWord,
                    'trueAnswer' : trueAnswer,
                    'userAnswer' : userAnswer,
                    'userSession' : userSession
                },
                success: function (res) {
                    if (res.data.is_true === true){
                        $('#notificationRow').html('<div class="col-md-12"> ' +
                            '<div class="c-alert c-alert--success u-mb-medium"> ' +
                            '<span class="c-alert__icon"> ' +
                            '<i class="feather icon-check"></i> ' +
                            '</span> ' +
                            '<div class="c-alert__content">' +
                            '<h4 class="c-alert__title">Your answer is true! 1 point added</h4> ' +
                            '</div> ' +
                            '</div> ' +
                            '</div>')
                    }else{
                        $('#notificationRow').html('<div class="col-md-12"> ' +
                            '<div class="c-alert c-alert--danger"> ' +
                            '<span class="c-alert__icon"> ' +
                            '<i class="feather icon-slash"></i> ' +
                            '</span> ' +
                            '<div class="c-alert__content"> ' +
                            '<h4 class="c-alert__title">Your answer is wrong! 1 point decreased</h4> ' +
                            '</div> ' +
                            '</div> ' +
                            '</div>')
                    }

                    $('notificationRow').visibility = 'hidden';
                    $('#userAnswer').val(' ');
                    span = document.getElementById("point");
                    span.innerHTML = res.point;

                    trueWordSpan = document.getElementById("trueWord");
                    trueWordSpan.innerHTML = "("+res.word.answer.name+")";

                    $('#shuffledWord').val(res.word.shuffledWord)
                }
            });
        }
    </script>
@stop
