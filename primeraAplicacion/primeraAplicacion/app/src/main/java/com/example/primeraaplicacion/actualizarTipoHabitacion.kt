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

class actualizarTipoHabitacion : AppCompatActivity() {

    var cajaActualizarTipoHab:EditText?=null
    var textoCodigoTipoHabitacion:TextView?=null
    var cajaActualizarPrecio:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_actualizar_tipo_habitacion)

        textoCodigoTipoHabitacion = findViewById(R.id.textoCodigoTipoHabitacion)
        cajaActualizarTipoHab = findViewById(R.id.cajaActualizarTipoHab)
        cajaActualizarPrecio = findViewById(R.id.cajaActualizarPrecio)

        val codigo_tpH = intent.getStringExtra("codigo_tpH").toString()

        val btnVolverActualizarTpHab = findViewById<TextView>(R.id.btnVolverActualizarTpHab)
        val btnActualizarTipoHab = findViewById<Button>(R.id.btnActualizarTipoHab)

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_tipoHabitacion/seleccionarTipoHabitacion.php?codigo_tpH=$codigo_tpH"
        val jsonObjectRequest= JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                textoCodigoTipoHabitacion?.setText(response.getString("codigo_tpH"))
                cajaActualizarTipoHab?.setText(response.getString("tipo_tpH"))
                cajaActualizarPrecio?.setText(response.getString("valor_tpH"))

            }, { error ->
                Toast.makeText(this, "No se encontro ninguna habitacion con ese codigo", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,gestionTipoHabitacion::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)


        btnVolverActualizarTpHab.setOnClickListener{
            val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
            startActivity(intent)
        }

        btnActualizarTipoHab.setOnClickListener {
            val tipo_tpH = cajaActualizarTipoHab?.text.toString()
            val precio_tpH = cajaActualizarPrecio?.text.toString()

            if(tipo_tpH.equals("") || precio_tpH.equals("")){
                Toast.makeText(applicationContext,"Los campos no pueden estar vacios",Toast.LENGTH_LONG).show()
            }else{
                actualizarTipoHabitacion()
            }
        }
    }

    private fun actualizarTipoHabitacion(){
        val codigo_tpH = intent.getStringExtra("codigo_tpH").toString()

        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_tipoHabitacion/actualizarTipoHabitacion.php?codigo_tpH=$codigo_tpH"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Se ha actualizado el tipo de habitacion correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "El tipo de habitacion no se ha podido actualizar, error: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("tipo_tpH", cajaActualizarTipoHab?.text.toString());
                parametros.put("valor_tpH", cajaActualizarPrecio?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}