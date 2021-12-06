package com.example.podcastv8;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.jean.jcplayer.model.JcAudio;
import com.example.jean.jcplayer.view.JcPlayerView;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;

public class HomeActivity extends AppCompatActivity {

    private Button LogoutBtn;

    private String podCat = "";
    private String podCat2 = "";
    private String getPodCatFromDatabase;


    private boolean checkPermission = false;
    Uri uri;
    String songName,songUrl;
    ListView listView;

    ArrayList<String> arrayListSongsName = new ArrayList<>();
    ArrayList<String> arrayListSongsUrl = new ArrayList<>();
    ArrayList<String> arrayListPodCategory = new ArrayList<>();

    ArrayAdapter<String> arrayAdapter;

    JcPlayerView jcPlayerView;
    ArrayList<JcAudio> jcAudios = new ArrayList<>();



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home8);


        podCat = getIntent().getStringExtra("category");


        Toast.makeText(this, podCat, Toast.LENGTH_SHORT).show();


        listView = findViewById(R.id.myListView);
        jcPlayerView = findViewById(R.id.jcplayer);

        retrieveSongs();

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                jcPlayerView.playAudio(jcAudios.get(position));
                jcPlayerView.setVisibility(View.VISIBLE);
                jcPlayerView.createNotification();
            }
        });

    }


    private void retrieveSongs() {


        DatabaseReference databaseReference = FirebaseDatabase.getInstance().getReference("Podcasts");



        Query query=databaseReference.orderByChild("category").equalTo(podCat);

        query.addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                for(DataSnapshot ds :dataSnapshot.getChildren()){

                    Song songObj = ds.getValue(Song.class);

                    getPodCatFromDatabase = songObj.getPcategory();


                    arrayListSongsName.add(songObj.getpname());
                    arrayListSongsUrl.add(songObj.getimage());


                    jcAudios.add(JcAudio.createFromURL(songObj.getpname(), songObj.getimage()));

                }


                arrayAdapter = new ArrayAdapter<String>(HomeActivity.this,android.R.layout.simple_list_item_1,arrayListSongsName)
                {



                    @NonNull
                    @Override
                    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {


                        View view = super.getView(position, convertView, parent);
                        TextView textView = (TextView) view.findViewById(android.R.id.text1);

                        textView.setSingleLine(true);
                        textView.setMaxLines(1);

                        return view;


                    }
                };


                jcPlayerView.initPlaylist(jcAudios,null);
                listView.setAdapter(arrayAdapter);


            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });



    }









}
