@extends('layouts.master')
@section('title', 'Project Pertama')
@section('judul', '')


<style type="text/css">
    .table-scroll {
        position: relative;
        margin: auto;
        overflow: hidden;
    }

    .table-wrap {
        width: 100%;
        overflow: auto;
    }

    .table-scroll table {
        width: 100%;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-scroll th,
    .table-scroll td {
        padding: 5px 10px;
        border: 1px solid #000;
        background: #fff;
        white-space: nowrap;
        vertical-align: top;
    }

    .table-scroll thead,
    .table-scroll tfoot {
        background: #f9f9f9;
    }

    .clone {
        position: absolute;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .clone th,
    .clone td {
        visibility: hidden
    }

    .clone td,
    .clone th {
        border-color: transparent
    }

    .clone tbody th {
        visibility: visible;
        color: #000;
        background: #fff;
    }

    .clone thead th {
        height: 100px;
        line-height: 100px;
        text-align: center;
    }

    .clone .fixed-side {
        border: 1px solid #000;
        background: #eee;
        visibility: visible;
    }

    .clone thead,
    .clone tfoot {
        background: transparent;
    }

</style>

@section('content')
     <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <div class='tableauPlaceholder' style='width: 1366px; height: 100%;'>
<object class='tableauViz' width='100%' height='571' style='display:none;'>
<param name='host_url' value='https%3A%2F%2Fsmartanalytics0.telkom.co.id%2F' /> 
<param name='embed_code_version' value='3' /> 
<param name='site_root' value='&#47;t&#47;TelkomRegionalAnalytics' />
<param name='name' value='icarev2&#47;AlertDash' />
<param name='tabs' value='no' />
<param name='toolbar' value='yes' />
<param name='showAppBanner' value='false' />
</object>
</div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('before-footer')

@endsection

@section('after-footer')

    <script type='text/javascript' src='https://smartanalytics0.telkom.co.id/javascripts/api/viz_v1.js'></script>

@endsection
