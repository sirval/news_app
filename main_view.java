package com.ohukaiv.uecaacmobile;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.text.method.ScrollingMovementMethod;
import android.view.View;
import android.widget.ImageButton;
import android.widget.TextView;

import java.util.List;

public class main_view extends AppCompatActivity {
    public TextView detailedText, detailedHeader;
     ImageButton myNavBar ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_view);
        //detailedText = (TextView) findViewById(R.id.textViewHeader);
        detailedHeader = (TextView) findViewById(R.id.textViewMain);
        myNavBar = (ImageButton) findViewById(R.id.imageButtonUserBack);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar2);
//display listview content on listview click
        String displayHolder = getIntent().getStringExtra("MainHeader");
        String displayHolder2 = getIntent().getStringExtra("MainMessage");
        detailedHeader.setMovementMethod(new ScrollingMovementMethod());
        detailedHeader.setText(displayHolder2);
       toolbar.setTitle(displayHolder);

        //code to display listview content goes here

        myNavBar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
              // Bundle bundle =
                Intent intent = new Intent(main_view.this, News.class);
                startActivity(intent);
                finish();
            }
        });

    }
}
