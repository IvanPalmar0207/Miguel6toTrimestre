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

class eliminarTipoHabitacion : AppCompatActivity() {

    var cajaCodigoTipoHabEliminar:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_tipo_habitacion)

        val btnVolverELiminarTipoHab = findViewById<Button>(R.id.btnVolverELiminarTipoHab)
        val btnConfimarEliminarTipoHab = findViewById<Button>(R.id.btnConfimarEliminarTipoHab)

        cajaCodigoTipoHabEliminar = findViewById(R.id.cajaCodigoTipoHabEliminar)

        btnVolverELiminarTipoHab.setOnClickListener {
            val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
            startActivity(intent)
        }

        btnConfimarEliminarTipoHab.setOnClickListener {
            val codigoHab = cajaCodigoTipoHabEliminar?.text.toString()

            if (codigoHab.equals("")){
                Toast.makeText(applicationContext,"Debes ingresar un codigo a eliminar, intenta nuevamente",Toast.LENGTH_LONG).show()
            }else{
                eliminarTipoHabitacion()
            }

        }

    }

    private fun eliminarTipoHabitacion(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_tipoHabitacion/eliminarTipoHabitacion.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Has eliminado correctamente el tipo de habitacion",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "No se ha podido eliminar el tipo de habitacion, error: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("codigo_tpH", cajaCodigoTipoHabEliminar?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}