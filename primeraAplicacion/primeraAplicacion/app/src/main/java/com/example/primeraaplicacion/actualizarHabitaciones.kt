package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class actualizarHabitaciones : AppCompatActivity() {

    var descripcionHabitacionAH:EditText?=null
    var minimoPersonasAH:EditText?=null
    var maximoPersonasAH:EditText?=null
    var imagenHabitacionAH:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_actualizar_habitaciones)

        descripcionHabitacionAH = findViewById(R.id.descripcionHabitacionAH)
        minimoPersonasAH = findViewById(R.id.minimoPersonasAH)
        maximoPersonasAH = findViewById(R.id.maximoPersonasAH)
        imagenHabitacionAH = findViewById(R.id.imagenHabitacionAH)

        val numero_hab = intent.getStringExtra("numero_hab").toString()

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/seleccionarHabitacion.php?numero_hab=$numero_hab"
        val jsonObjectRequest= JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                descripcionHabitacionAH?.setText(response.getString("descripcion_hab"))
                minimoPersonasAH?.setText(response.getString("minimoPersonas_hab"))
                maximoPersonasAH?.setText(response.getString("maximoPersonas_hab"))
                imagenHabitacionAH?.setText(response.getString("image_hab"))

            }, { error ->
                Toast.makeText(this, "No se pudo encontrar ninguna habitacion con ese numero, intenta nuevamente", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,solicitarActualizarHabitacion::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        val btnVolverGestionHABA = findViewById<TextView>(R.id.btnVolverGestionHABA)
        btnVolverGestionHABA.setOnClickListener {
            val intent = Intent(applicationContext, solicitarActualizarHabitacion::class.java)
            startActivity(intent)
        }

        val btnActualizarHabitacion = findViewById<Button>(R.id.btnActualizarHabitacion)
        btnActualizarHabitacion.setOnClickListener {
            if(descripcionHabitacionAH?.text.toString().equals("") || minimoPersonasAH?.text.toString().equals("") || maximoPersonasAH?.text.toString().equals("") || imagenHabitacionAH?.text.toString().equals("")){
                Toast.makeText(applicationContext,"Ninguno de los campos debe estar vacio para poder realizar la actualizacion",Toast.LENGTH_LONG).show()
            }
            else{
                actualizarHabitacion()
            }
        }
    }
    private fun actualizarHabitacion(){
        val numero_hab = intent.getStringExtra("numero_hab").toString()
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/actualizarHabitacion.php?numero_hab=$numero_hab"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"La habitacion se ha actualizado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al actualizar habitacion, el error fue $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("descripcion_hab", descripcionHabitacionAH?.text.toString());
                parametros.put("minimoPersonas_hab", minimoPersonasAH?.text.toString());
                parametros.put("maximoPersonas_hab", maximoPersonasAH?.text.toString());
                parametros.put("image_hab",imagenHabitacionAH?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}