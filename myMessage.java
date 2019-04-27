package com.ohukaiv.uecaacmobile;

import android.widget.BaseAdapter;

import java.io.Serializable;

/**
 * Created by 6930p on 7/2/2018.
 */

public class myMessage implements Serializable {


    String messageId;
    String messageDate;
    String message;
    String messageType;

    public  String messageId() {
        return messageId;
    }

    public myMessage(String messageId, String messageDate, String message, String messageType) {
        this.messageId = messageId;
        this.messageDate = messageDate;
        this.message = message;
        this.messageType = messageType;
    }

    public String getMessageDate() {
        return messageDate;
    }

    public String getMessage() {
        return message;
    }

    public String getMessageType() {
        return messageType;
    }

    public myMessage() {

    }
}
