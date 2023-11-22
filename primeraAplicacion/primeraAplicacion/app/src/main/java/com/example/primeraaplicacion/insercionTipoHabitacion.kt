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
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class insercionTipoHabitacion : AppCompatActivity() {

    var cajaCodigoTipoHabIN:EditText?=null
    var cajaTipoHabIN:EditText?=null
    var cajaPrecioTipoHabIN:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_insercion_tipo_habitacion)

        val btnAgregarTipoHab = findViewById<Button>(R.id.btnAgregarTipoHab)
        val btnVolverTipoGestionIn = findViewById<TextView>(R.id.btnVolverTipoGestionIn)

        cajaCodigoTipoHabIN = findViewById(R.id.cajaCodigoTipoHabIN)
        cajaTipoHabIN = findViewById(R.id.cajaTipoHabIN)
        cajaPrecioTipoHabIN = findViewById(R.id.cajaPrecioTipoHabIN)

        btnAgregarTipoHab.setOnClickListener {
            val codigo_tpH = cajaCodigoTipoHabIN?.text.toString()
            val tipo_tpH = cajaTipoHabIN?.text.toString()
            val precio_tpH = cajaPrecioTipoHabIN?.text.toString()

            if(codigo_tpH.equals("") || tipo_tpH.equals("") || precio_tpH.equals("")){
                Toast.makeText(applicationContext,"Debes llenar todos los campos, intenta nuevamente",Toast.LENGTH_LONG).show()
            }else{
                insertarTipoHabitacion()
            }
        }

        btnVolverTipoGestionIn.setOnClickListener{
            val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
            startActivity(intent)
        }

    }

    private fun insertarTipoHabitacion(){

        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_tipoHabitacion/insertarTipoHabitacion.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Has registrado correctamente el tipo de habitacion", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar el tipo de habitacion, error: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("codigo_tpH", cajaCodigoTipoHabIN?.text.toString());
                parametros.put("tipo_tpH", cajaTipoHabIN?.text.toString());
                parametros.put("valor_tpH", cajaPrecioTipoHabIN?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }
}