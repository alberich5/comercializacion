<div class="">
  <center><h3>Ambito</h3></center>

<table class="table">
    <thead>
      <tr>
        <th>Delegacion</th>
        <th>Privada</th>
        <th>Estatal</th>
        <th>Federal</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="valle in valles">
        <td>valles</td>
        <td>@{{ valle.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>
      <tr v-for="matia in matias">
        <td>Matias</td>
        <td>@{{ matia.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>
      <tr v-for="hua in huajuapan">
        <td>Huajuapan de leon</td>
        <td>@{{ hua.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>
      <tr v-for="tux in tuxtepec">
        <td>Tuxtepec</td>
        <td>@{{ tux.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>
      <tr v-for="juchi in juchitan">
        <td>Juchitan</td>
        <td>@{{ juchi.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
      <tr v-for="sali in salina">
        <td>Salina Cruz</td>
        <td>@{{ sali.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>

      <tr v-for="puert in puerto">
        <td>Puerto Escondido</td>
        <td>@{{ puert.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>
      <tr v-for="pino in pinotepa">
        <td>Pinotepa Nacional</td>
        <td>@{{ pino.total }}</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>

      </tr>

    </tbody>
  </table>

  </div>
