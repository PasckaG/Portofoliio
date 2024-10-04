@extends('students.layout')

@section('content')
    <style>
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            background: #f8f9fa; /* Warna latar belakang */
            padding: 15px 0; /* Padding atas dan bawah */
            margin-top: 20px; /* Spasi di atas marquee */
            position: relative; /* Memungkinkan penempatan absolut di dalam */
            bottom: 0; /* Memastikan teks berada di bagian bawah */
        }

        .marquee p {
            display: inline-block;
            font-size: 24px; /* Ukuran font yang lebih besar */
            animation: marquee 10s linear infinite; /* Durasi dan jenis animasi */
        }

        @keyframes marquee {
            0% { transform: translateX(100%); } /* Mulai dari kanan */
            100% { transform: translateX(-100%); } /* Pergi ke kiri */
        }
    </style>

    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 CRUD (Create, Read, Update and Delete)</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->mobile }}</td>
  
                                        <td>
                                            <a href="{{ url('/student/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/student/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/student' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Marquee -->
        <div class="marquee">
            <p>Selamat datang di halaman Data Siswa!</p>
        </div>
    </div>
@endsection
