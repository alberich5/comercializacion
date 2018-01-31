@extends('layouts.app')

@section('content')
  <div id="consulta">
    <div class="container">
      <center><input type="text" name="" value="" v-model="fecha" disabled></center>
<h3>Total de Quejas por Delegaciones</h3>

<div id="tablatotal">

        <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th class="col-sm-2">Delagacion</th>
                <th class="col-sm-2">Numero de Quejas</th>

              </tr>
            </thead>
            <tbody>
              <tr v-for="valle in valles">
                <td>Valles Centrales</td>
                <td>@{{ valle.total }}</td>

              </tr>
              <tr v-for="matia in matias">
                <td>Matias Romero</td>
                <td>@{{ matia.total }}</td>
              </tr>
              <tr v-for="hua in huajuapan">
                <td>Huajuapan de leon</td>
                <td>@{{ hua.total }}</td>
              </tr>
              <tr v-for="tux in tuxtepec">
                <td>Tuxtepec</td>
                <td>@{{ tux.total }}</td>
              </tr>
              <tr v-for="juchi in juchitan">
                <td>Juchitan</td>
                <td>@{{ juchi.total }}</td>
              </tr>
              <tr v-for="sali in salina">
                <td>Salina Cruz</td>
                <td>@{{ sali.total }}</td>
              </tr>

              <tr v-for="puert in puerto">
                <td>Puerto Escondido</td>
                <td>@{{ puert.total }}</td>
              </tr>
              <tr v-for="pino in pinotepa">
                <td>Pinotepa Nacional</td>
                <td>@{{ pino.total }}</td>
              </tr>
              <tr v-for="glo in global">
                <td><span class="label label-primary">Global</span></td>
                <td><span class="label label-primary">@{{ glo.total }}</span></td>
              </tr>
            </tbody>
          </table>
</div>

            @include('grafica.quejames')
            @include('grafica.ambito')
    </div>
    <div class="row">
       <div class="col-xs-12">
         <pre>@{{$data}}</pre>
       </div>
     </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#consulta',
            //funcion al crear el objet
            created: function() {
              this.totalmatias();
              this.totalvalles();
              this.totalhuajuapan();
              this.totaltuxtepec();
              this.totaljuchitan();
              this.totalsalina();
              this.totalpuerto();
              this.totalpinotepa();
              this.totalglobal();
            },
            data:{
                valles:'',
                matias:'',
                huajuapan:'',
                tuxtepec:'',
                juchitan:'',
                salina:'',
                puerto:'',
                pinotepa:'',
                global:'',
                delegacion:'matias',
                fecha:'2018-01-01',

                    },
            methods:{
                totalmatias:function(){
                    var urlmatias = 'total?delegacion=matias&fecha='+this.fecha;
                    axios.get(urlmatias).then(response => {
                    this.matias = response.data
                  });
                },
                totalvalles:function(){
                    var urlmatias = 'total?delegacion=valles&fecha='+this.fecha;
                    axios.get(urlmatias).then(response => {
                    this.valles = response.data
                  });
                },
                totalhuajuapan:function(){
                    var urlmatias = 'total?delegacion=huajuapan&fecha='+this.fecha;
                    axios.get(urlmatias).then(response => {
                    this.huajuapan = response.data
                  });
                },
                totaltuxtepec:function(){
                    var url = 'total?delegacion=tuxtepec&fecha='+this.fecha;
                    axios.get(url).then(response => {
                    this.tuxtepec = response.data
                  });
                },
                totaljuchitan:function(){
                    var url = 'total?delegacion=juchitan&fecha='+this.fecha;
                    axios.get(url).then(response => {
                    this.juchitan = response.data
                  });
                },
                totalsalina:function(){
                    var url = 'total?delegacion=salina&fecha='+this.fecha;
                    axios.get(url).then(response => {
                    this.salina = response.data
                  });
                },
                totalpuerto:function(){
                    var url = 'total?delegacion=puerto&fecha='+this.fecha;
                    axios.get(url).then(response => {
                    this.puerto = response.data
                  });
                },
                totalpinotepa:function(){
                    var url = 'total?delegacion=pinotepa&fecha='+this.fecha;
                    axios.get(url).then(response => {
                    this.pinotepa = response.data
                  });
                },
                totalglobal:function(){
                  var url = 'global';
                  axios.get(url).then(response => {
                  this.global = response.data
                });
                },
        }});
    </script>
@endsection
