@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Message</th>
            <th></th>
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($unseen_notifications as $notification)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$notification->message}}</td>
                <td><a href="#" class="notification"><span>New</span></a></td>
            </tr>
        @endforeach
        @foreach($seen_notifications as $notification)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$notification->message}}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/home"  class="btn">Cancel</a></button>
@stop
