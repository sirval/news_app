package com.ohukaiv.uecaacmobile;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.List;

/**
 * Created by 6930p on 7/2/2018.
 */

public class messageList extends ArrayAdapter<myMessage>  {
    private Activity context;
    public List<myMessage> message_List;
    private LayoutInflater mInflater;


    public messageList(Activity context, List<myMessage> message_List)
    {
        super( context, R.layout.list_layout,message_List);
        this.context = context;
        this.message_List = message_List;
    }

    @Override
    public int getCount(){
        return message_List.size();
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable final View convertView, @NonNull ViewGroup parent) {
        LayoutInflater inflater = context.getLayoutInflater();
        View listViewHeader = inflater.inflate(R.layout.list_layout, null, true);


        //set views
        TextView textHeader = (TextView) listViewHeader.findViewById(R.id.textLayoutHeader);
        TextView textMessage = (TextView) listViewHeader.findViewById(R.id.textMessageType);
        TextView textDate = (TextView) listViewHeader.findViewById(R.id.textLayoutDate);

        //get views

        myMessage myMessage = message_List.get(getCount()- position - 1 );
        textMessage.setText(myMessage.getMessage());
        textHeader.setText(myMessage.getMessageType());
        textDate.setText(myMessage.getMessageDate());

        return listViewHeader;

    }


}
