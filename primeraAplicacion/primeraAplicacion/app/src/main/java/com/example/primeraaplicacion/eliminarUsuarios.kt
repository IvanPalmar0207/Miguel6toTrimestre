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

class eliminarUsuarios : AppCompatActivity() {

    var cajaNumeroDocumentoEliminarUSU:EditText?=null
    var cajaCorreoElectronicoEliminarUSU:EditText?=null
    var cajaContrasenaEliminarUSU:EditText?=null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_usuarios)

        cajaNumeroDocumentoEliminarUSU = findViewById(R.id.cajaNumeroDocumentoEliminarUSU)
        cajaCorreoElectronicoEliminarUSU = findViewById(R.id.cajaCorreoElectronicoEliminarUSU)
        cajaContrasenaEliminarUSU = findViewById(R.id.cajaContrasenaEliminarUSU)

        val btnVolverCasaEU = findViewById<Button>(R.id.btnVolverCasaEU)
        val btnVolverEU = findViewById<Button>(R.id.btnVolverEU)
        val btnEliminarUSU = findViewById<Button>(R.id.btnEliminarUSU)

        btnVolverCasaEU.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }

        btnVolverEU.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }

        btnEliminarUSU.setOnClickListener {

            val numeroDocumento = cajaNumeroDocumentoEliminarUSU?.text.toString()
            val correoElectronico = cajaCorreoElectronicoEliminarUSU?.text.toString()
            val contrasena = cajaContrasenaEliminarUSU?.text.toString()

            if(numeroDocumento.equals("") || correoElectronico.equals("") || contrasena.equals("")){
                Toast.makeText(applicationContext,"No se puede eliminar el usuario, completa los campos correspondientes",Toast.LENGTH_LONG).show()
            }
            else{
                eliminarUsu()
            }
        }

    }

    private fun eliminarUsu(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/eliminarUsuarios.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El usuario ha sido eliminado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al eliminar usuarios $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("numeroDocumento_usu", cajaNumeroDocumentoEliminarUSU?.text.toString());
                parametros.put("correoElectronico_usu", cajaCorreoElectronicoEliminarUSU?.text.toString());
                parametros.put("numeroDocumento_usu", cajaContrasenaEliminarUSU?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}