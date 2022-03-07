@extends('Task::layout')
@section('style')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Gochi+Hand");

        body {
            background-color: #a39bd2;
            min-height: 70vh;
            padding: 1rem;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #494a4b;
            font-family: "Pacifico", cursive;
            text-align: center;
            font-size: 130%;
        }

        @media only screen and (min-width: 700px) {
            body {
                min-height: 100vh;
            }
        }

        .container {
            width: 100%;
            height: auto;
            min-height: 500px;
            max-width: 700px;
            min-width: 250px;
            background: #f1f5f8;
            background-image: radial-gradient(#bfc0c1 7.2%, transparent 0);
            background-size: 25px 25px;
            border-radius: 20px;
            box-shadow: 4px 3px 7px 2px #00000040;
            padding: 1rem;
            box-sizing: border-box;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .heading__title {
            transform: rotate(2deg);
            padding: 0.2rem 1.2rem;
            border-radius: 20% 5% 20% 5%/5% 20% 25% 20%;
            background-color: rgba(0, 255, 196, 0.7);
            font-size: 1.5rem;
        }

        @media only screen and (min-width: 500px) {
            .heading__title {
                font-size: 2rem;
            }
        }

        .heading__img {
            width: 24%;
        }

        .form__label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form__input {
            box-sizing: border-box;
            background-color: transparent;
            padding: 0.7rem;
            border-bottom-right-radius: 15px 3px;
            border-bottom-left-radius: 3px 15px;
            border: solid 3px transparent;
            border-bottom: dashed 3px #ea95e0;
            font-family: "Gochi Hand", cursive;
            font-size: 1rem;
            color: rgba(63, 62, 65, 0.7);
            width: 70%;
            margin-bottom: 20px;
        }

        .form__input:focus {
            outline: none;
            border: solid 3px #ea95e0;
        }

        @media only screen and (min-width: 500px) {
            .form__input {
                width: 60%;
            }
        }

        .button {
            margin-left: 1.5rem;
            padding: 0;
            border: none;
            transform: rotate(4deg);
            transform-origin: center;
            font-family: "Gochi Hand", cursive;
            text-decoration: none;
            padding-bottom: 3px;
            border-radius: 5px;
            box-shadow: 0 2px 0 #494a4b;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background-image: url("data:image/gif;base64,R0lGODlhBAAEAIABAAAAAAAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjEgNjQuMTQwOTQ5LCAyMDEwLzEyLzA3LTEwOjU3OjAxICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1LjEgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5NUY1OENCRDdDMDYxMUUyOTEzMEE1MEM5QzM0NDVBMyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5NUY1OENCRTdDMDYxMUUyOTEzMEE1MEM5QzM0NDVBMyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjk1RjU4Q0JCN0MwNjExRTI5MTMwQTUwQzlDMzQ0NUEzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjk1RjU4Q0JDN0MwNjExRTI5MTMwQTUwQzlDMzQ0NUEzIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkEAQAAAQAsAAAAAAQABAAAAgYEEpdoeQUAOw==");
            background-color: rgba(0, 255, 196, 0.7);
        }

        .button span {

            background: #f1f5f8;
            display: block;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: 2px solid #494a4b;
        }

        .button:active, .button:focus {

            transform: translateY(4px);
            padding-bottom: 0px;
            outline: 0;
        }

        .toDoList {
            text-align: left;
        }

        .toDoList li {
            position: relative;
            padding: 0.5rem;
            list-style: none;
        }

        a {
            text-decoration: none;
            margin-left: 1rem;
            color: #393535;
            font-family: "Gochi Hand", cursive;
        }

    </style>
@endsection
@section('content')
    <section class="container">
        <div class="heading">
            <img class="heading__img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/756881/laptop.svg">
            <h1 class="heading__title">Danh sách việc cần làm</h1>
        </div>
        <form class="form" method="POST" action="">
            <div>
                <label class="form__label" for="todo">~ Công việc của bạn ~</label>
                <input class="form__input" type="text" id="name" name="name" placeholder="Tên công việc" size="30"
                       required>
                <input class="form__input" type="text" id="content" name="content" size="30"
                       placeholder="Nội dung công việc" required>
                <button class="button" type="submit"><span>Thêm mới</span></button>
            </div>
        </form>
        <div>
            <div class="row">
                <ul class="col-md-6 toDoList">
                    @empty($taskOfUser == false)
                        @foreach($taskOfUser as $task)
                            @if($task->status == 0)
                                <li id="li-{{$task->id}}">
                                    <span class="material-icons-outlined">
                                highlight_off
                            </span><a href="{{route('task-detail')}}">{{$task->content}}</a>
                                </li>
                            @endif
                        @endforeach
                    @endempty
                </ul>
                <ul class="col-md-6 toDoList">
                    @empty($taskOfUser == false)
                        @foreach($taskOfUser as $task)
                            @if($task->status == 1)
                                <li><span style="margin-left: 2rem" class="material-icons">
                    check_circle
                   </span><a href="{{route('task-detail')}}">{{$task->content}}</a>
                                </li>
                            @endif
                        @endforeach
                    @endempty
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @include('Task::js')
@endpush
