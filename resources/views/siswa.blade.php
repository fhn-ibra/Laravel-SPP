<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP |  Pembayaran</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/image/logo.png">

    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="bdc32cbf-6a56-4e52-8c28-f55231a04054">
        try {
            (function(w, d) {
                ! function(o, p, q, r) {
                    o[q] = o[q] || {};
                    o[q].executed = [];
                    o.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    o.zaraz.q = [];
                    o.zaraz._f = function(s) {
                        return async function() {
                            var t = Array.prototype.slice.call(arguments);
                            o.zaraz.q.push({
                                m: s,
                                a: t
                            })
                        }
                    };
                    for (const u of ["track", "set", "debug"]) o.zaraz[u] = o.zaraz._f(u);
                    o.zaraz.init = () => {
                        var v = p.getElementsByTagName(r)[0],
                            w = p.createElement(r),
                            x = p.getElementsByTagName("title")[0];
                        x && (o[q].t = p.getElementsByTagName("title")[0].text);
                        o[q].x = Math.random();
                        o[q].w = o.screen.width;
                        o[q].h = o.screen.height;
                        o[q].j = o.innerHeight;
                        o[q].e = o.innerWidth;
                        o[q].l = o.location.href;
                        o[q].r = p.referrer;
                        o[q].k = o.screen.colorDepth;
                        o[q].n = p.characterSet;
                        o[q].o = (new Date).getTimezoneOffset();
                        if (o.dataLayer)
                            for (const B of Object.entries(Object.entries(dataLayer).reduce(((C, D) => ({
                                    ...C[1],
                                    ...D[1]
                                })), {}))) zaraz.set(B[0], B[1], {
                                scope: "page"
                            });
                        o[q].q = [];
                        for (; o.zaraz.q.length;) {
                            const E = o.zaraz.q.shift();
                            o[q].q.push(E)
                        }
                        w.defer = !0;
                        for (const F of [localStorage, sessionStorage]) Object.keys(F || {}).filter((H => H
                            .startsWith("_zaraz_"))).forEach((G => {
                            try {
                                o[q]["z_" + G.slice(7)] = JSON.parse(F.getItem(G))
                            } catch {
                                o[q]["z_" + G.slice(7)] = F.getItem(G)
                            }
                        }));
                        w.referrerPolicy = "origin";
                        w.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(o[q])));
                        v.parentNode.insertBefore(w, v)
                    };
                    ["complete", "interactive"].includes(p.readyState) ? zaraz.init() : o.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (err) {
            console.error('Failed to run Cloudflare Zaraz: ', err)
            fetch('/cdn-cgi/zaraz/t', {
                credentials: 'include',
                keepalive: true,
                method: 'GET',
            })
        };
    </script>
</head>

<body class="hold-transition container-fluid">
    
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td width=5%>No</td>
                        <td>Nama Petugas</td>
                        <td>Nama Siswa</td>
                        <td>Tgl. Bayar</td>
                        <td>Bulan Dibayar</td>
                        <td>Tahun Dibayar</td>
                        <td>Nominal SPP</td>
                        <td>Jum Bayar</td>
                    </tr>
                </thead>

                <?php $no = 1; ?>
                @foreach ($data as $data)
                    <tr>
        
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->petugas->nama_petugas }}</td>
                        <td>{{ $data->siswa->nama }}</td>
                        <td>{{ $data->tgl_bayar }}</td>
                        <td>{{ $data->bulan_dibayar }}</td>
                        <td>{{ $data->tahun_dibayar }}</td>
                        <td>{{ $data->siswa->spp->nominal }}</td>
                        <td>{{ $data->jumlah_bayar }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>




    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>

    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
    

</body>

</html>
