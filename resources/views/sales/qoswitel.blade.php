@extends('layouts.master')

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <label for="">Quality Of Sales By Witel</label>
                </div>
		<div class="card-body">
                	<script type='text/javascript' src='https://smartanalytics0.telkom.co.id/javascripts/api/viz_v1.js'></script>
                        <div class='tableauPlaceholder' style='width: 100px; height: 735px;'>
                            <object class='tableauViz' width='100%' height='735' style='display:none;'>
                                <param name='host_url' value='https%3A%2F%2Fsmartanalytics0.telkom.co.id%2F' />
                                <param name='embed_code_version' value='3' />
                                <param name='site_root' value='&#47;t&#47;TelkomRegionalAnalytics' />
                                <param name='name' value='icarev2&#47;chrtviewbywitel' />
                                <param name='tabs' value='no' />
                                <param name='toolbar' value='yes' />
                                <param name='showAppBanner' value='false' />
                            </object>
                        </div>
		 </div>
            </div>
        </div>
    </section>
@endsection

@section('before-footer')

@endsection
