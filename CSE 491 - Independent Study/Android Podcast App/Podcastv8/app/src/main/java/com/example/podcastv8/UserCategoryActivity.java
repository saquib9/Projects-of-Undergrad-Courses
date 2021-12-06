package com.example.podcastv8;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

public class UserCategoryActivity extends AppCompatActivity {


    private ImageView bangla9, english9;
    private Button LogoutBtn;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_category);



        bangla9 = (ImageView) findViewById(R.id.proceed_to_add_new_bangla_podcast9);
        english9 = (ImageView) findViewById(R.id.proceed_to_add_new_english_podcast9);

        bangla9.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(UserCategoryActivity.this, HomeActivity.class);
                intent.putExtra("category", "bangla");
                startActivity(intent);
            }
        });

        english9.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(UserCategoryActivity.this, HomeActivity.class);
                intent.putExtra("category", "english");
                startActivity(intent);
            }
        });



/*        LogoutBtn = (Button) findViewById(R.id.btn_logout);

        LogoutBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(UserCategoryActivity.this, MainActivity.class);
                startActivity(intent);
            }
        });        */



        Toast.makeText(this, "User login successful", Toast.LENGTH_SHORT).show();

    }


}



