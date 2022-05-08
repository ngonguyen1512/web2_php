<h1>Thông kê </h1>
<div id="myfirstchart" style="height: 250px;"></div>
<script>
    new Morris.Bar({
    element: 'myfirstchart',
    data: [
        { year: '2022-02', order: 3,sales: 78700000 },
        { year: '2022-03', order: 9,sales: 119632000 },
        { year: '2022-04', order: 3,sales: 88760000 },
    ],
    xkey: 'year',
    ykeys: ['order','sales'],
    labels: ['Số lượng đơn','Doanh thu']
    });
</script>