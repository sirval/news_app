package com.ohukaiv.uecaacmobile;

import android.app.Application;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.text.method.ScrollingMovementMethod;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;
import java.lang.String;

public class News extends AppCompatActivity {
//declare views and database components

    private static final int timeLimit = 1500;
    private static long backPressed;

    FloatingActionButton floatingActionButton;
    Toolbar toolBarTitle, toolBarItem;
    ListView listViewMessage;
    TextView textViewcreed,listViewvision;
    Button butNews, butCreed, butVision;
    List<myMessage> my_messageList;
    private ProgressBar mDialog;
    private AdView mAdView;

    public DatabaseReference databaseReference;

public int getCount(){

    return my_messageList.size();
}

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_news);

        mAdView = (AdView) findViewById(R.id.adView);
        final AdRequest adRequest = new AdRequest.Builder()
                .build();
        mAdView.loadAd(adRequest);

        //method to display main_view activity goes here


 //initialize views and database components
        butCreed =(Button) findViewById(R.id.buttonCreed);
        butNews =(Button) findViewById(R.id.buttonNews);
        butVision=(Button) findViewById(R.id.buttonVision);
        mDialog = (ProgressBar) findViewById(R.id.progressBar2);

       // toolBarExpanded.setTitle(getResources().getString(R.string.app_name));
        toolBarItem = (Toolbar) findViewById(R.id.toolbarItem);
        toolBarTitle = (Toolbar) findViewById(R.id.toolbarTitle);
        toolBarTitle.setTitle("AAC Latest News and Event");
        databaseReference = FirebaseDatabase.getInstance().getReference("AAC News");
        listViewMessage = (ListView) findViewById(R.id.listViewNews);

        textViewcreed =(TextView) findViewById(R.id.editTextCreed);
        listViewvision =(TextView) findViewById(R.id.editTextVision);
        textViewcreed.setMovementMethod(new ScrollingMovementMethod());
        listViewvision.setMovementMethod(new ScrollingMovementMethod());

        floatingActionButton = (FloatingActionButton) findViewById(R.id.floatingActionButton);
        my_messageList = new ArrayList<>();

        textViewcreed.setText("\n" +
                "The Doctrines of United Evangelical Church are and shall be that United Evangelical Church affirms its faith in the supreme authority and sufficiency of the Holy Scripture as the word of God; the eternal oneness in the Father, the Son and the Holy Spirit, the love of God to the world manifested in the gift of His Son; the virgin birth of the Lord Jesus Christ; His sinless life, His atoning death. His bodily resurrection, His ascension and His coming again: Man’s fall, alienation, spiritual death, eternal punishment; the necessity of repentance, redemption from sin through the propitiatory sacrifice of the Lord Jesus Christ; justification by faith alone, the necessity of the direct work of the Holy Spirit to impart and sustain spiritual life: the essential unity of all who believe in the Lord Jesus Christ, and obligation resting on those who bear His name to afford evidence of their discipleship by a life of obedience to His commands.   \n" +
                "\n" +
                "\n");
        listViewvision.setText("\n"+"U.E.C VISION"+"\n" +"A purposeful Bible-based church, united in worship and service to God and humanity, wholistically towards the rapture."+"\n" +
                "\n"+"U.E.C MISSION" +"\n" + "United Evangelical Church exists to glorify God and reach the unreached for Christ through evangelism and missions, equipping and empowering the saints, and social action for the benefit of mankind."+"\n");


        listViewvision.setVisibility(View.GONE);
        textViewcreed.setVisibility(View.GONE);
        listViewMessage.setVisibility(View.VISIBLE);
        mDialog.setVisibility(View.VISIBLE);

        listViewMessage.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {


                String displayHeader  = my_messageList.get(getCount()-position - 1).getMessageType();
                String displayMessage = my_messageList.get(getCount()- position -1 ).getMessage();
                Intent intent = new Intent(News.this, main_view.class);
                intent.putExtra("MainMessage", displayMessage);
                intent.putExtra("MainHeader", displayHeader);
                startActivity(intent);
                finish();
                   }
        });


// hide visibility of creed and vision listview on News button clicked
        butNews.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                listViewvision.setVisibility(View.GONE);
                textViewcreed.setVisibility(View.GONE);
                listViewMessage.setVisibility(View.VISIBLE);
                toolBarTitle.setTitle("AAC Latest News and Event");
                mDialog.setVisibility(View.GONE);
                            }
        });
        // hide visibility of News and vision listview on Creed button clicked
        butCreed.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                listViewvision.setVisibility(View.GONE);
                listViewMessage.setVisibility(View.GONE);
                textViewcreed.setVisibility(View.VISIBLE);
                toolBarTitle.setTitle("U.E.C Creed");
                mDialog.setVisibility(View.GONE);

            }
        });

        butVision.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                listViewMessage.setVisibility(View.GONE);
                textViewcreed.setVisibility(View.GONE);
                listViewvision.setVisibility(View.VISIBLE);
                toolBarTitle.setTitle("U.E.C Vision and Mission");
                mDialog.setVisibility(View.GONE);

            }
        });

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(News.this,Login.class);
                startActivity(intent);
                finish();

            }
        });
        Query query = FirebaseDatabase.getInstance().getReference("Message").limitToFirst(100);
        query.addListenerForSingleValueEvent(valueEventListener);
    }

    //load database values on activity resume
// and effects newly added data to the database


    ValueEventListener valueEventListener =new ValueEventListener() {
        @Override
        public void onDataChange(DataSnapshot dataSnapshot) {
            my_messageList.clear();
            for (DataSnapshot ds: dataSnapshot.getChildren())
            {
                myMessage ns = ds.getValue(myMessage.class);
                my_messageList.add(ns);

                messageList myNews_listAdapter = new messageList(News.this, my_messageList);
                listViewMessage.setAdapter(myNews_listAdapter);
mDialog.setVisibility(View.GONE);
            }


        }

        @Override
        public void onCancelled(DatabaseError databaseError) {

        }
    };

    //exit app with dialog
    @Override
    public void onBackPressed()
    {
        if (timeLimit + backPressed > System.currentTimeMillis()){
            super.onBackPressed();
        }else {
            Toast.makeText(getApplicationContext(),"Touch again to exit", Toast.LENGTH_LONG).show();
        }
        backPressed = System.currentTimeMillis();
    }


    }

