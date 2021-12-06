package com.example.podcastv8;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

public class AdminCategoryActivity extends AppCompatActivity {

    private ImageView bangla, english;
    private Button LogoutBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin_category);

        bangla = (ImageView) findViewById(R.id.proceed_to_add_new_bangla_podcast8);
        english = (ImageView) findViewById(R.id.proceed_to_add_new_english_podcast8);

        bangla.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(AdminCategoryActivity.this, AdminAddNewPodcastActivity.class);
                intent.putExtra("category", "bangla");
                startActivity(intent);
            }
        });

        english.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(AdminCategoryActivity.this, AdminAddNewPodcastActivity.class);
                intent.putExtra("category", "english");
                startActivity(intent);
            }
        });



        LogoutBtn = (Button) findViewById(R.id.btn_logout);

        LogoutBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(AdminCategoryActivity.this, MainActivity.class);
                startActivity(intent);
            }
        });



        Toast.makeText(this, "Admin login successful", Toast.LENGTH_SHORT).show();

    }
}
