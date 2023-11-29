package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.AdapterView
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.Spinner
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONArray

class insertarMobiliario : AppCompatActivity() {

    var posicionTipoHab:String?=null
    var posicionPaqueteMob:String?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_insertar_mobiliario)

        val btnVolverMobiliario = findViewById<TextView>(R.id.btnVolverMobiliario)

        btnVolverMobiliario.setOnClickListener{
            val intent = Intent(applicationContext,gestionMobiliario::class.java)
            startActivity(intent)
        }

        val codigo_pMb = findViewById<Spinner>(R.id.codigo_pMb)

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/seleccionarPaqueteMobiliario.php"
        val jsonObjectRequest = JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                var players = mutableListOf<String>()

                var JsonArray : JSONArray = response.getJSONArray("data")

                for (i in 0 until JsonArray.length()){
                    var JsonObject = JsonArray.getJSONObject(i)
                    players.add(JsonObject.getString("paqueteTipo_pMb"))
                }

                val arrayAdapter = ArrayAdapter<String>(this,R.layout.spinnerstyle,players)

                codigo_pMb.adapter = arrayAdapter
                codigo_pMb.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
                    override fun onItemSelected(
                        p0: AdapterView<*>?,
                        p1: View?,
                        p2: Int,
                        p3: Long) {
                        posicionPaqueteMob = (p2+1).toString()
                    }

                    override fun onNothingSelected(p0: AdapterView<*>?) {
                        TODO("Not yet implemented")
                    }

                }
            }, { error ->
                Toast.makeText(this, "No se encontro ningun paquete de mobiliario", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,insertarMobiliario::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        val codigo_tpH = findViewById<Spinner>(R.id.codigo_tpH)

        val queue1 = Volley.newRequestQueue(this)
        val url1 = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/seleccionarTipoHabitacion.php"
        val jsonObjectRequest1 = JsonObjectRequest(
            Request.Method.GET,url1,null,
            { response1 ->
                var players1 = mutableListOf<String>()

                var JsonArray1 : JSONArray = response1.getJSONArray("data")

                for (i in 0 until JsonArray1.length()){
                    var JsonObject1 = JsonArray1.getJSONObject(i)
                    players1.add(JsonObject1.getString("tipo_tpH"))
                }

                val arrayAdapter1 = ArrayAdapter<String>(this,R.layout.spinnerstyle,players1)

                codigo_tpH.adapter = arrayAdapter1
                codigo_tpH.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
                    override fun onItemSelected(
                        p0: AdapterView<*>?,
                        p1: View?,
                        p2: Int,
                        p3: Long) {
                        posicionTipoHab = (p2+1).toString()
                    }

                    override fun onNothingSelected(p0: AdapterView<*>?) {
                        TODO("Not yet implemented")
                    }

                }
            }, { error ->
                Toast.makeText(this, "No se encontro ningun tipo de habitacion", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,insertarMobiliario::class.java)
                startActivity(intent)
            }
        )
        queue1.add(jsonObjectRequest1)

        val btnAgregarMobiliario = findViewById<Button>(R.id.btnAgregarMobiliario)

        btnAgregarMobiliario.setOnClickListener {
            agregarMobiliario()
        }
    }

    private fun agregarMobiliario(){

        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/insertarMobiliario.php"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El mobiliario ha sido registrado",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionMobiliario::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al agregar mobiliario, intenta de nuevo $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("codigo_pMb", posicionPaqueteMob.toString());
                parametros.put("codigo_tpH", posicionTipoHab.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }


}