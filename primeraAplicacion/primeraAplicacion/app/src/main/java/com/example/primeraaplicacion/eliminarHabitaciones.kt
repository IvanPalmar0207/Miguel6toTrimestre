package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class eliminarHabitaciones : AppCompatActivity() {
    var cajaCodigoHabEliminar:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_habitaciones)

        val btnVolverELiminarHabitacion = findViewById<Button>(R.id.btnVolverELiminarHabitacion)
        val btnConfimarEliminarHabitacion = findViewById<Button>(R.id.btnConfimarEliminarHabitacion)

        cajaCodigoHabEliminar = findViewById(R.id.cajaCodigoHabEliminar)

        btnVolverELiminarHabitacion.setOnClickListener {
            val intent = Intent(applicationContext,gestionHabitaciones::class.java)
            startActivity(intent)
        }

        btnConfimarEliminarHabitacion.setOnClickListener {
            if(cajaCodigoHabEliminar?.text.toString().equals("")){
                Toast.makeText(applicationContext,"El numero de habitacion no puede ser procesado vacio",Toast.LENGTH_LONG).show()
            }else {
                eliminarHabitacion()
            }

        }

    }

    private fun eliminarHabitacion(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_habitacion/eliminarHabitacion.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"La habitacion se ha eliminado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionHabitaciones::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Hubo un error eliminando la habitacion, el error fur: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("numero_hab", cajaCodigoHabEliminar?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }
}