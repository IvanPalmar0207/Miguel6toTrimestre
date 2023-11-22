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

class eliminarMobiliario : AppCompatActivity() {

    var cajaCodigoMobiliarioEl:EditText?=null
    var cajaCodigoTipoHabEliminarMob:EditText?=null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_mobiliario)

        val btnConfimarEliminarMOB = findViewById<Button>(R.id.btnConfimarEliminarMOB)
        val btnVolverELiminarMob = findViewById<Button>(R.id.btnVolverELiminarMob)

        cajaCodigoMobiliarioEl = findViewById(R.id.cajaCodigoMobiliarioEl)
        cajaCodigoTipoHabEliminarMob = findViewById(R.id.cajaCodigoTipoHabEliminarMob)

        btnVolverELiminarMob.setOnClickListener {
            val intent = Intent(applicationContext,gestionMobiliario::class.java)
            startActivity(intent)
        }

        btnConfimarEliminarMOB.setOnClickListener {
            val codigoMob = cajaCodigoMobiliarioEl?.text.toString()

            if (codigoMob.equals("")){
                Toast.makeText(applicationContext,"No se puede eliminar el mobiliario, ingresa un campo valido",Toast.LENGTH_LONG).show()
            }else{
                eliminarMobiliarioo()
            }
        }

    }

    private fun eliminarMobiliarioo(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/eliminarMobiliario.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El mobiliario se ha eliminado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionMobiliario::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al eliminar nobiliario, error: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("codigo_mB", cajaCodigoMobiliarioEl?.text.toString());
                parametros.put("codigo_tpH",cajaCodigoTipoHabEliminarMob?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}