@extends('layouts.master')
@section('header')
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-push-2">
            <div class="panel panel-primary client-controls">
                <div class="panel-heading">
                    <h3 class="panel-title">Make a call</h3>
                </div>
                <div class="panel-body">
                    <p><strong>Status</strong></p>
                    <div class="well well-sm" id="call-status">
                        Connecting to Twilio...
                    </div>
                    <button class="btn btn-lg btn-success answer-button" disabled>Answer call</button>
                    <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-push-2 phone">
                        <div class="row1">
                            <div class="col-md-12">
                            <input type="tel" name="name" id="telNumber" class="form-control tel" value="" />
                                <div class="num-pad">
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            1
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            2 <span class="small">
                                                <p>
                                                    ABC</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            3 <span class="small">
                                                <p>
                                                    DEF</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            4 <span class="small">
                                                <p>
                                                    GHI</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            5 <span class="small">
                                                <p>
                                                    JKL</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            6 <span class="small">
                                                <p>
                                                    MNO</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            7 <span class="small">
                                                <p>
                                                    PQRS</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            8 <span class="small">
                                                <p>
                                                    TUV</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            9 <span class="small">
                                                <p>
                                                    WXYZ</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            *
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            0 <span class="small">
                                                <p>
                                                    +</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="num">
                                        <div class="txt">
                                            #
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="clearfix">
                                </div>
                                    <button type="button" class="btn btn-success btn-block flatbtn call-customer-button">
                                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                        Call customer
                                    </button>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    @stop