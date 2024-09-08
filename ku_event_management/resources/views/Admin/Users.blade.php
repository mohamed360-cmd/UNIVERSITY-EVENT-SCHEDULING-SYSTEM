@section('navContent')
<h3>Kenyata University Event Manager</h3>
<h4>All Users</h4>
@endSection
@section('content')
<div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Email</th>
                <th>User Role</th>
                <th> Status</th>
                <th>Account Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->status }}</td>
                @if($user->status == "active")
                <td>
                    <form id="suspendAccountform">
                        @csrf
                        <button type="button" class="btnUserTable suspendUser" data-user-id="{{$user->id}}"  onclick="suspendAccount(this)">Suspend Account</button></td>
                    </form>
                @else
                <td>
                    <form id="activateAccountForm">
                        @csrf
                        <button type="button" class="btnUserTable activateUser" data-user-id="{{$user->id}}" onclick="activateAccount(this)">Activate Account</button></td>
                    </form>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endSection
@extends('Admin.layouts.DashboardLayout')
