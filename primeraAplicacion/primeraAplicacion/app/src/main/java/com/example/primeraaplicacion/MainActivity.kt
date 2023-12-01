package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Switch
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class MainActivity : AppCompatActivity() {
    var numeroDocumentoLG:EditText?=null
    var emailLogin:EditText?=null
    var contrasenaLogin:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        numeroDocumentoLG = findViewById(R.id.numeroDocumentoLG)
        emailLogin = findViewById(R.id.emailLogin)
        contrasenaLogin = findViewById(R.id.contrasenaLogin)

        val noTenerCuenta = findViewById<TextView>(R.id.noTenerCuenta)
        val btnIngresar = findViewById<Button>(R.id.btnIngresar)

        noTenerCuenta.setOnClickListener{
            val intent = Intent(applicationContext,Registrarse::class.java)
            startActivity(intent)
        }

        btnIngresar.setOnClickListener{
            if(numeroDocumentoLG?.text.toString().equals("") || emailLogin?.text.toString().equals("") || contrasenaLogin?.text.toString().equals("")){
                Toast.makeText(applicationContext,"Ingresa todos los campos, no pueden haber campos vacios",Toast.LENGTH_LONG).show()
            }else{
                ingresarSistema()
            }
        }
    }

    private fun ingresarSistema(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/validarSistema.php?numeroDocumento_usu=$numeroDocumentoLG&correoElectronico_usu=$emailLogin"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                if(!response.isEmpty()) {
                    Toast.makeText(this, "Has iniciado sesion correctamente", Toast.LENGTH_LONG).show()
                    val intent = Intent(applicationContext, menuPrincipal::class.java)
                    startActivity(intent)
                }else{
                    Toast.makeText(this, "No se ha encontrado el usuario", Toast.LENGTH_LONG).show()
                }
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar usuario $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("numeroDocumento_usu", numeroDocumentoLG?.text.toString());
                parametros.put("correoElectronico_usu", emailLogin?.text.toString());
                parametros.put("contrasena_usu", contrasenaLogin?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}