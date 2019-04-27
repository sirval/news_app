package com.ohukaiv.uecaacmobile;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class Login extends AppCompatActivity  implements View.OnClickListener{
    private  int counter=5;
    EditText editemail, editPassword;
    TextView tvInfo;
    Button btnLogin;
    Toolbar toolbar;
    ImageView arrowBack;
    public ProgressDialog progressDialog;
    private FirebaseAuth firebaseAuth;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        firebaseAuth = FirebaseAuth.getInstance();
        if (firebaseAuth.getCurrentUser() !=null){

            //code goes here
            Intent intent = new Intent(Login.this, UserMessage.class);
            startActivity(intent);
            finish();
        }

        toolbar=(Toolbar) findViewById(R.id.toolBarLogin);
        toolbar.setTitle("Login");
         editemail  = (EditText) findViewById(R.id.editEmail);
         editPassword = (EditText) findViewById(R.id.editPassword);
         tvInfo =  (TextView) findViewById(R.id.textInfo);
         btnLogin = (Button) findViewById(R.id.butlogin);
        tvInfo.setText("Number of Attempts Remaining: 5");
        editemail.setFocusable(true);

        arrowBack = (ImageView) findViewById(R.id.imageButtonLogBack);

        arrowBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Login.this, News.class);
                startActivity(intent);
                finish();
            }
        });

        progressDialog =new ProgressDialog(this);
        btnLogin.setOnClickListener(this);

    }


    private void userLogin() {

        String userEmail = editemail.getText().toString().trim();
        String userPassword = editPassword.getText().toString().trim();

        if (TextUtils.isEmpty(userEmail) || TextUtils.isEmpty(userPassword)) {
            Toast.makeText(this, "Email or Password Field cannot be empty", Toast.LENGTH_LONG).show();
            return;
        }

        progressDialog.setMessage("Please wait while we verify your login credentials");
        progressDialog.show();


        firebaseAuth.signInWithEmailAndPassword(userEmail, userPassword)
                .addOnCompleteListener(this, new OnCompleteListener<AuthResult>() {
                    @Override
                    public void onComplete(@NonNull Task<AuthResult> task) {

                        progressDialog.dismiss();
                        if (task.isSuccessful()) {
                            Intent i = new Intent(Login.this, UserMessage.class);
                            startActivity(i);
                            finish();
                        }else {
                            Toast.makeText(Login.this, "Invalid Email or Password. Please visit"+"\n"+"AAC Scretary or the Admins for" +"\n"+"Login credentials", Toast.LENGTH_LONG).show();
                        }
                    }

                });

    }

    @Override
    public void onClick(View v) {
        if (v == btnLogin){
            userLogin( );
        }
    }
}

