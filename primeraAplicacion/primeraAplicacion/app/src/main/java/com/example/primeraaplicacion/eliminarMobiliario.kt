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

    var cajaCodigoMobiliario:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_mobiliario)

        cajaCodigoMobiliario = findViewById(R.id.cajaCodigoMobiliario)

        val btnVolverELiminarMobiliario = findViewById<Button>(R.id.btnVolverELiminarMobiliario)
        val btnConfimarEliminarMobiliario = findViewById<Button>(R.id.btnConfimarEliminarMobiliario)

        btnVolverELiminarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,gestionMobiliario::class.java)
            startActivity(intent)
        }

        btnConfimarEliminarMobiliario.setOnClickListener {
            if(cajaCodigoMobiliario?.text.toString().equals("")){
                Toast.makeText(applicationContext,"El codigo no puede ser un campo vacio",Toast.LENGTH_LONG).show()
            }else {
                eliminarMobiliarioBTN()
            }
        }
    }

    private fun eliminarMobiliarioBTN(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/eliminarMobiliario.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Has eliminado correctamente el mobiliario", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "No se ha podido eliminar el mobiliario, el error fue: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("codigo_mB", cajaCodigoMobiliario?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}