@extends('back-end.layouts.master')
@section('title', 'Báo cáo tổng quan')
@section('styles')
    <link href="{{asset('store_backend/css/index.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title">
                        <h4><i class="fal fa-tachometer-alt mr-2"></i> <span class="font-weight-semibold">Trang tổng quan</span></h4>
                    </div>
                    <div class="header-elements text-center text-md-left mb-3 mb-md-0">
                        <div id="dashBoardDateRangeOption" class="btn-group" role="group">
                            <button id="" type="button" class="btn dropdown-toggle bg-teal-400" data-toggle="dropdown"><i class="fa fa-calendar-alt mr-2"></i><span class="dateValue"> Hôm nay</span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:" data-range="today" class="dropdown-item"><i class="fal fa-calendar-check"></i> Hôm nay</a></li>
                                <li><a href="javascript:" data-range="yesterday" class="dropdown-item"><i class="fal fa-calendar-day"></i> Hôm qua</a></li>
                                <li><a href="javascript:" data-range="thisweek" class="dropdown-item"><i class="fal fa-calendar-week"></i> Tuần này</a></li>
                                <li><a href="javascript:" data-range="thismonth" class="dropdown-item"><i class="fal fa-calendar-alt"></i> Tháng này</a></li>
                                <li><a href="javascript:" data-range="lastmonth" class="dropdown-item"><i class="fal fa-calendar-alt"></i> Tháng trước</a></li>
                            </ul>
                            <input type="hidden" id="dateRangeValue" class="dateRangeValue" value="">
                        </div>
                        <input type="hidden" id="storeId" value="114184">
                        <div id="depotOptions" class="btn-group ml-2 mt-2 mt-sm-0" role="group">
                            <button id="" type="button" class="btn dropdown-toggle bg-teal-400" data-toggle="dropdown"><i class="fal fa-map-marker-alt mr-2"></i><span class="depotValue">Ông Trùm Nội Trợ</span></button>
                            <ul id="depotSelectElement" class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:" data-value="" class="dropdown-item">Tất cả cửa hàng</a></li>
                                <li><a href="javascript:" data-value="115559" class="dropdown-item">Ông Trùm Nội Trợ</a></li>
                            </ul>
                            <input type="hidden" id="depotId" value="">
                        </div>
                    </div>
                </div>
                <div class="content pt-0">
                    <div class="d-flex flex-wrap">
                        <div class="col-xl-8">
                            <div class="data-sumary card">
                                <div class="card-body">
                                    <div class="block-data">
                                        <div class="pb-0">
                                            <div class="row">
                                                <div class="col-sm-3 col-6 px-1 px-lg-2">
                                                    <div class="py-2 bg-success mb-2 mb-md-0 rounded text-center text-white">
                                                        <div><i class="fal fa-chart-bar mr-2 fa-lg"></i> DOANH THU</div>
                                                        <div class="text-center pt-2">
                                                            <span class="totalRevenue text-white">475.000</span><br>
                                                            <span class="rateRevenue text-white" title="46.558.000"><i class="fa fa-long-arrow-down"></i> 99%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6 px-1 px-lg-2">
                                                    <div class="py-2 bg-blue-400 mb-2 mb-md-0 rounded text-center text-white">
                                                        <div><i class="fal fa-shopping-bag mr-2 fa-lg"></i> BÁN LẺ</div>
                                                        <div class="text-center pt-2">
                                                            <span class="totalRetailRevenue">0</span><br>
                                                            <span class="rateRetail" title="14.440.000"><i class="fa fa-long-arrow-down"></i> 100%</span><span class="totalBillRetail"> (0 hóa đơn)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6 px-1 px-lg-2">
                                                    <div class="bg-orange-600 py-2 mb-md-0 rounded text-center text-white">
                                                        <div><i class="fal fa-shopping-cart mr-2 fa-lg"></i> ĐƠN HÀNG</div>
                                                        <div class="text-center pt-2">
                                                            <span class="totalShippingRevenue">41.69 triệu</span><br>
                                                            <span class="rateShipping" title="20.521.000"><i class="fa fa-long-arrow-up"></i> 103%</span><span class="totalBillShipping"> (22 đơn)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-6 px-1 px-lg-2">
                                                    <div class="bg-brown-300 py-2 rounded text-center text-white">
                                                        <div> <i class="fal fa-cube mr-2 fa-lg"></i> TỒN KHO</div>
                                                        <div class="pt-2">
                                                            <span class="totalRemainValue">1.2 tỷ</span><br>
                                                            <span class="totalProductRemainValue">4.005 sản phẩm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <canvas id="myChart" width="400" height="180"></canvas>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table id="topDashboardOrder" class="table text-nowrap" data-hasblockrows="1">
                                                <thead class="card-header">
                                                <tr style="background: #fff;">
                                                    <th class="text-start"><h5 class="card-title font-weight-semibold"><i class="far fa-shopping-cart mr-2"></i> Đơn hàng</h5></th>
                                                    <th class="text-end" data-toggle="tooltip" title="" data-original-title="Số lượng">SL</th>
                                                    <th class="text-end">Doanh thu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="">Mới</td>
                                                    <td class="text-end"><span class="">2</span></td>
                                                    <td class="text-end"><span class="mb-0">940.000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="">Đã gửi vận chuyển</td>
                                                    <td class="text-end"><span class="">0</span></td>
                                                    <td class="text-end"><span class="mb-0">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="">Thành công</td>
                                                    <td class="text-end"><span class="">0</span></td>
                                                    <td class="text-end"><span class="mb-0">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="">Thất bại</td>
                                                    <td class="text-end"><span class="">0</span></td>
                                                    <td class="text-end"><span class="mb-0">0</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="">Hủy</td>
                                                    <td class="text-end"><span class="">1</span></td>
                                                    <td class="text-end"><span class="mb-0">432.000</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bold">Tổng</td>
                                                    <td class="text-end"><span class="fw-bold">3</span></td>
                                                    <td class="text-end"><span class="fw-bold mb-0">1.372.000</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="card">
                                        <div class="table-responsive overflow-hidden">
                                            <table id="topDashboardProduct" class="table text-nowrap table-md" data-hasblockrows="1">
                                                <thead class="card-header">
                                                <tr style="background: #fff;">
                                                    <th class="text-start"><h5 class="card-title fw-bold"><i class="far fa-cube mr-2"></i> Top sản phẩm</h5></th>
                                                    <th class="text-end">SL</th>
                                                    <th class="text-end">Tồn</th>
                                                    <th class="text-end">Doanh thu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for ($i = 0; $i < 7; $i++)
                                                    <tr>
                                                        <td class="text-wrap">
                                                            <a href="#" class="text-default letter-icon-title">XIAOMI MIJIA GEN 2 _ MÀU TRẮNG - TRƯNG BÀY</a>
                                                            <div class="fs-5"></div>
                                                        </td>
                                                        <td class="text-end"><span class="">1</span></td>
                                                        <td class="text-end"><span class="">8</span></td>
                                                        <td class="text-end"><span class="mb-0">3.000.000</span></td>
                                                    </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                                    <div id="historyDashboarArea" class="card">
                                        <div class="card-header bg-light py-2 header-elements-inline">
                                            <h5 class="card-title font-weight-semibold"><i class="fal fa-money-bill-alt mr-2"></i> Hóa đơn mới</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="media-list">
                                                @for ($i = 0; $i < 6; $i++)
                                                <li class="media">
                                                    <div class="mr-2">
                                                        <a href="/order/manage/detail?storeId=114184&amp;id=191463040" class="btn color-shoppe fal fa-shopping-cart fa-lg"></a>
                                                    </div>
                                                    <div class="media-body">Mộng Trinh
                                                        <div class="font-size-sm">an hour ago</div>
                                                    </div>
                                                    <div class="ml-3 text-end price-order">
                                                        <a class="text-dark font-weight-semibold" href="/order/manage/detail?storeId=114184&amp;id=191463040">140.000</a>
                                                        <br><span class="badge bg-pill bg-info">Đã xác nhận</span>
                                                    </div>
                                                </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="{{ asset('store_backend/js/Chart.js') }}"></script>
    <script src="{{ asset('store_backend/js/add-chart.js') }}"></script>
@stop
