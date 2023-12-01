package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.AdapterView
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.EditText
import android.widget.Spinner
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONArray

class insertarHabitaciones : AppCompatActivity() {
    var numeroHabitacionIH:EditText?=null
    var descripcionHabitacionIH:EditText?=null
    var minimoPersonasIH:EditText?=null
    var maximoPersonasIH:EditText?=null
    var imagenHabitacionIH:EditText?=null
    var posicionTipoHab:String?=null
    var posicionEstado:String?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_insertar_habitaciones)

        numeroHabitacionIH = findViewById(R.id.numeroHabitacionIH)
        descripcionHabitacionIH = findViewById(R.id.descripcionHabitacionIH)
        minimoPersonasIH = findViewById(R.id.minimoPersonasIH)
        maximoPersonasIH = findViewById(R.id.maximoPersonasIH)
        imagenHabitacionIH = findViewById(R.id.imagenHabitacionIH)

        val btnVolverGestionHABs = findViewById<TextView>(R.id.btnVolverGestionHABs)
        btnVolverGestionHABs.setOnClickListener {
            val intent = Intent(applicationContext,gestionHabitaciones::class.java)
            startActivity(intent)
        }

        val codigoTipoHahIH = findViewById<Spinner>(R.id.codigoTipoHahIH)

        val queue1 = Volley.newRequestQueue(this)
        val url1 = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/seleccionarTipoHabitacion.php"
        val jsonObjectRequest1 = JsonObjectRequest(
            Request.Method.GET,url1,null,
            { response ->
                var tipoHabitacion = mutableListOf<String>()

                var JsonArray1 : JSONArray = response.getJSONArray("data")

                for (i in 0 until JsonArray1.length()){
                    var JsonObject1 = JsonArray1.getJSONObject(i)
                    tipoHabitacion.add(JsonObject1.getString("tipo_tpH"))
                }

                val arrayAdapter1 = ArrayAdapter<String>(this,R.layout.spinnerstyle,tipoHabitacion)

                codigoTipoHahIH.adapter = arrayAdapter1
                codigoTipoHahIH.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
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
                val intent = Intent(applicationContext,gestionHabitacion::class.java)
                startActivity(intent)
            }
        )
        queue1.add(jsonObjectRequest1)

        val codigoEstadoIH = findViewById<Spinner>(R.id.codigoEstadoIH)

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/seleccionarEstado.php"
        val jsonObjectRequest = JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                var estadoHabitacion = mutableListOf<String>()

                var JsonArray : JSONArray = response.getJSONArray("data")

                for (i in 0 until JsonArray.length()){
                    var JsonObject = JsonArray.getJSONObject(i)
                    estadoHabitacion.add(JsonObject.getString("tipo_ed"))
                }

                val arrayAdapter = ArrayAdapter<String>(this,R.layout.spinnerstyle,estadoHabitacion)

                codigoEstadoIH.adapter = arrayAdapter
                codigoEstadoIH.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
                    override fun onItemSelected(
                        p0: AdapterView<*>?,
                        p1: View?,
                        p2: Int,
                        p3: Long) {
                        posicionEstado = (p2+1).toString()
                    }

                    override fun onNothingSelected(p0: AdapterView<*>?) {
                        TODO("Not yet implemented")
                    }

                }
            }, { error ->
                Toast.makeText(this, "No se encontro ningun estado de habitacion", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,gestionHabitacion::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        val btnAgregarHabitacion = findViewById<Button>(R.id.btnAgregarHabitacion)
        btnAgregarHabitacion.setOnClickListener {
            numeroHabitacionIH = findViewById(R.id.numeroHabitacionIH)
            descripcionHabitacionIH = findViewById(R.id.descripcionHabitacionIH)
            minimoPersonasIH = findViewById(R.id.minimoPersonasIH)
            maximoPersonasIH = findViewById(R.id.maximoPersonasIH)
            imagenHabitacionIH = findViewById(R.id.imagenHabitacionIH)
            if (numeroHabitacionIH?.text.toString().equals("") || descripcionHabitacionIH?.text.toString().equals("") || minimoPersonasIH?.text.toString().equals("") || maximoPersonasIH?.text.toString().equals("") || imagenHabitacionIH?.text.toString().equals("")){
                    Toast.makeText(applicationContext,"Ninguno de los campos puede estar vacio, intenta nuevamente",Toast.LENGTH_LONG).show()
            }else{
                agregarHabitacion()
            }
        }
    }

    private fun agregarHabitacion(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/insertarHabitacion.php"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"La habitacion se ha agregado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionHabitaciones::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar la habitacion, el error fue: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("numero_hab", numeroHabitacionIH?.text.toString());
                parametros.put("descripcion_hab", descripcionHabitacionIH?.text.toString());
                parametros.put("minimoPersonas_hab", minimoPersonasIH?.text.toString());
                parametros.put("maximoPersonas_hab", maximoPersonasIH?.text.toString());
                parametros.put("image_hab", imagenHabitacionIH?.text.toString());
                parametros.put("codigo_tpH", posicionTipoHab.toString());
                parametros.put("codigo_ed", posicionEstado.toString())
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}