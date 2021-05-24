@extends('layouts.master')

@section('content')
     <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('summary.detil') }}" method="POST" class="col-lg-12">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="WITEL">WITEL</label>
                                    <select name="WITEL" id="WITEL" class="form-control input-lg dinamis" data-dependent="STO"> 
                                        <option value="">DIVRE 2</option>
                                        @foreach ($getWitel as $data1)
                                            <option value="{{ $data1->WITEL }}">
                                                {{ $data1->WITEL }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="STO">STO</label>
                                    <select name="STO" id="STO" class="form-control input-lg dinamis">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div> --}}

                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary col-lg-12">Go</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="table-summary" class="table table-hover table-bordered table-responsive">
                        {{-- filter --}}
                        <thead>
                            <tr>
                                <th>WITEL</th>
                                @if (request()->filled('WITEL'))                              
                                <th>STO</th>
                                @endif
                                <th>TOTAL ALERT</th>
                                <th>OPEN</th>
                                <th>UNCONTACTED</th>
                                <th>CONTACTED</th>
                                <th>CLOSED</th>
                                <th>%OPEN</th>
                                <th>%CONTACTED</th>
                                <th>%UNCONTACTED</th>
                                <th>%CLOSED</th>
                            </tr>
                        </thead>
                        {{-- end --}}
                        <thead>
                            <tr>
                                <th>WITEL</th>
                                @if (request()->filled('WITEL'))                              
                                <th>STO</th>
                                @endif
                                <th>TOTAL ALERT</th>
                                <th>OPEN</th>
                                <th>UNCONTACTED</th>
                                <th>CONTACTED</th>
                                <th>CLOSED</th>
                                <th>%OPEN</th>
                                <th>%CONTACTED</th>
                                <th>%UNCONTACTED</th>
                                <th>%CLOSED</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getData as $item)
                                <tr>
                                    <td>{{ $item->WITEL }}</td>
                                    @if (request()->filled('WITEL'))                            
                                    <td>{{ $item->STO }}</td>
                                    @endif
                                    <td>{{ $item->TOTAL_ALERT }}</td>
                                    <td>{{ $item->Open }}</td>
                                    <td>{{ $item->Uncontacted }}</td>
                                    <td>{{ $item->Contacted }}</td>
                                    <td>{{ $item->Closed }}</td>
                                    <td>{{ number_format($item->PtgOpen ,1) . '%' }}</td>
                                    <td>{{ number_format($item->PtgContacted ,1) . '%' }}</td>
                                    <td>{{ number_format($item->PtgUncontacted ,1) . '%' }}</td>
                                    <td>{{ number_format($item->PtgClosed ,1) . '%' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('before-footer')


@endsection

@section('after-footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('.dinamis').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('summary.getSto') }}",
                    method:"POST",
                    data:{
                        select:select,
                        value:value,
                        dependent:dependent,
                        _token:_token
                    },
                    success:function(result)
                    {
                        $('#'+dependent).html(result);
                    }
                })
            }
        });

        $("#table-summary").DataTable({
             	    "lengthChange": false,
                    "paging": true,
                    "ordering": false,
                    "info": false,
                    
                    initComplete: function() {
                        this.api().columns().every(function() {
                            var column = this;
                            var select = $(
                                    '<select><option value=""></option></select>'
                                    )
                                .appendTo($(column.header()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util
                                        .escapeRegex(
                                            $(this).val()
                                        );

                                    column
                                        .search(val ? '^' + val + '$' : '',
                                            true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d +
                                    '">' + d + '</option>')
                            });
                        });
                    }
                });
    });
</script>
@endsection
