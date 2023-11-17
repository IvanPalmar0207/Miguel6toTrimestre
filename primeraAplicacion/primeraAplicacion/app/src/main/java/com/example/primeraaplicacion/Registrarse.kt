package com.example.primeraaplicacion

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley


class Registrarse : AppCompatActivity() {
    var nombre_usu:EditText?=null
    var apellidos_usu:EditText?=null
    var numeroDocumento_usu:EditText?=null
    var correoElectronico_usu:EditText?=null
    var contrasena_usu:EditText?=null
    var codigorl:EditText?=null
    var codigotpd:EditText?=null
    var confirmarContraseña:EditText?=null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_registrarse)

        nombre_usu = findViewById(R.id.nombre_usu)
        apellidos_usu = findViewById(R.id.apellidos_usu)
        numeroDocumento_usu = findViewById(R.id.numeroDocumento_usu)
        correoElectronico_usu = findViewById(R.id.correoElectronico_usu)
        contrasena_usu = findViewById(R.id.contrasena_usu)
        codigorl = findViewById(R.id.codigorl)
        confirmarContraseña = findViewById(R.id.confirmarContraseña)
        codigotpd = findViewById(R.id.codigotpd)

        var btn_Registrarse = findViewById<Button>(R.id.btn_Registrarse)
        var btnVolverGestionUsu = findViewById<TextView>(R.id.btnVolverGestionUsu)


        btn_Registrarse.setOnClickListener {

            val name = nombre_usu?.text.toString()
            val apellidos = apellidos_usu?.text.toString()
            val nombreUsu = numeroDocumento_usu?.text.toString()
            val email = correoElectronico_usu?.text.toString()
            val contrasena = contrasena_usu?.text.toString()
            val contraserRe = confirmarContraseña?.text.toString()
            val codigorl = codigorl?.text.toString()
            val codigotpd = codigotpd?.text.toString()

            if(name.equals("") || apellidos.equals("") || nombreUsu.equals("") || email.equals("") || contrasena.equals("") || contraserRe.equals("") || codigorl.equals("") || codigotpd.equals("")){
                Toast.makeText(this,"No se pueden ingresar campos vacios, intenta nuevamente",Toast.LENGTH_LONG).show()
            }
            else if(contrasena != contraserRe){
                    Toast.makeText(this,"Las contraseñas deben de ser iguales, intenta de nuevo",Toast.LENGTH_LONG).show()
            }
            else{
                insertarUsuarios()
            }
        }

        btnVolverGestionUsu.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }

    }

    private fun insertarUsuarios(){

        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/insertarUsuarios.php"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Has sido registrado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar usuario $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("nombres_usu", nombre_usu?.text.toString());
                parametros.put("apellidos_usu", apellidos_usu?.text.toString());
                parametros.put("numeroDocumento_usu", numeroDocumento_usu?.text.toString());
                parametros.put("correoElectronico_usu",correoElectronico_usu?.text.toString());
                parametros.put("contrasena_usu",contrasena_usu?.text.toString());
                parametros.put("codigo_rl",codigorl?.text.toString());
                parametros.put("codigo_tpD",codigotpd?.text.toString())
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }
}