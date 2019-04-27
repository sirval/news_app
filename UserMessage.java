package com.ohukaiv.uecaacmobile;

import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.text.TextUtils;
//import android.text.format.DateFormat;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
//import android.widget.ListView;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.List;

public class UserMessage extends AppCompatActivity {
    DatabaseReference databaseReference;
    EditText textMessage,header;
    TextView editDate;
    Button butSave;
    Toolbar userMessageToolbar;
    ImageView arrowBack;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_message);

        //firebase components
        databaseReference = FirebaseDatabase.getInstance().getReference("Message");
        textMessage = (EditText) findViewById(R.id.editMessage);
        editDate = (TextView) findViewById(R.id.editDate);
        butSave = (Button) findViewById(R.id.btnSave);
        header = (EditText) findViewById(R.id.editHeader);
        userMessageToolbar = (Toolbar) findViewById(R.id.toolBarUsermessage);
        userMessageToolbar.setTitle("News and Events Upload");
        arrowBack =(ImageView) findViewById(R.id.imageButtonUserBack);
        arrowBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(UserMessage.this, News.class);
                startActivity(intent);
                finish();
            }
        });
        //method date
        getDate();

        butSave.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                AddMessage();
                AlertDialog.Builder builder = new AlertDialog.Builder(UserMessage.this);

                builder.setMessage("Upload Another?")
                        .setPositiveButton("No", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Intent intent = new Intent(UserMessage.this, News.class);
                                startActivity(intent);
                                finish();
                            }
                        })
                        .setNegativeButton("Yes", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                textMessage.setText("");
                                header.setText("");
                                editDate.setText("");
                            }
                        });

                AlertDialog alert = builder.create();
                alert.show();
            }
        });
    }


    private void AddMessage() {
        String messageUpload = textMessage.getText().toString().trim();
        String mySpinner = header.getText().toString().trim();
        String my_Date = editDate.getText().toString().trim();

        //check if text field is empty
        if (!TextUtils.isEmpty(messageUpload)) {
            String id = databaseReference.push().getKey();
            myMessage my_message = new myMessage(id, my_Date, messageUpload, mySpinner);
            databaseReference.child(id).setValue(my_message);
            Toast.makeText(this, "News/Event Uploaded Successfully", Toast.LENGTH_LONG).show();
        } else {
            Toast.makeText(this, "Please type a message to upload", Toast.LENGTH_LONG).show();
        }
    }

    public void getDate() {
        String currentDateTimeString = DateFormat.getDateTimeInstance().format(new Date());

// textView is the TextView view that should display it
        editDate.setText(currentDateTimeString);
    }
}


