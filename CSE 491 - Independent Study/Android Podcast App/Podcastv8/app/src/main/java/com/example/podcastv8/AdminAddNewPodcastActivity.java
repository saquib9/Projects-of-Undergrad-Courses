package com.example.podcastv8;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.Continuation;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;
import com.google.firebase.storage.UploadTask;

import java.net.URI;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;

public class AdminAddNewPodcastActivity extends AppCompatActivity {


    private String CategoryName, Pname, Description, saveCurrentDate, saveCurrentTime;
    private Button AddNewPodcastButton;
    private ImageView InputPodcastFile;
    private EditText InputPodcastName, InputPodcastDetails;
    private String productRandomKey, downloadImageUrl;

    private StorageReference ProductImagesRef;
    private DatabaseReference ProductsRef;
    private ProgressDialog loadingBar;



    // private TextView TextViewAudio;

    private static final int GalleryPick = 1;

    private Uri ImageUri;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin_add_new_podcast);




        CategoryName = getIntent().getExtras().get("category").toString();
        ProductImagesRef = FirebaseStorage.getInstance().getReference().child("Podcast Files");
        ProductsRef = FirebaseDatabase.getInstance().getReference().child("Podcasts");

        InputPodcastFile = (ImageView) findViewById(R.id.open_audio_file);

        InputPodcastName = (EditText) findViewById(R.id.podcast_name);

        InputPodcastDetails = (EditText) findViewById(R.id.podcast_details);

        AddNewPodcastButton = (Button) findViewById(R.id.add_new_podcast);

        loadingBar = new ProgressDialog(this);





//        TextViewAudio = (TextView) findViewById(R.id.text_view_podcast_file_name);
//
//        progressBar = (ProgressBar) findViewById(R.id.progressBar);
//
//        referencePodcasts = FirebaseDatabase.getInstance().getReference().child("podcasts");
//
//        mStorageRef = FirebaseStorage.getInstance().getReference().child("podcasts");



        InputPodcastFile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view)
            {
                OpenFolder();
            }
        });

         AddNewPodcastButton.setOnClickListener(new View.OnClickListener() {
             @Override
             public void onClick(View view) {
                ValidatePodcastData();
             }
         });


        Toast.makeText(this, CategoryName , Toast.LENGTH_SHORT).show();
    }



    private void OpenFolder()
    {
        Intent galleryIntent = new Intent();
        galleryIntent.setAction(Intent.ACTION_GET_CONTENT);
        galleryIntent.setType("audio/*");
        startActivityForResult(galleryIntent, GalleryPick);

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data)
    {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode==GalleryPick  &&  resultCode==RESULT_OK  &&  data!=null)
        {
            ImageUri = data.getData();
            InputPodcastFile.setImageURI(ImageUri);
        }
    }

    private void ValidatePodcastData()
    {
        Description = InputPodcastDetails.getText().toString();
        Pname = InputPodcastName.getText().toString();


        if (ImageUri == null)
        {
            Toast.makeText(this, "Podcast file is mandatory...", Toast.LENGTH_SHORT).show();
        }
        else if (TextUtils.isEmpty(Description))
        {
            Toast.makeText(this, "Please write podcast description...", Toast.LENGTH_SHORT).show();
        }
        else if (TextUtils.isEmpty(Pname))
        {
            Toast.makeText(this, "Please write product name...", Toast.LENGTH_SHORT).show();
        }
        else
        {
            StoreProductInformation();
        }



    }

    private void StoreProductInformation()

    {

        loadingBar.setTitle("Add New Podcast");
        loadingBar.setMessage("Dear Admin, please wait while we are adding the new product.");
        loadingBar.setCanceledOnTouchOutside(false);
        loadingBar.show();


        Calendar calendar = Calendar.getInstance();

        SimpleDateFormat currentDate = new SimpleDateFormat("MMM dd, yyyy");
        saveCurrentDate = currentDate.format(calendar.getTime());

        SimpleDateFormat currentTime = new SimpleDateFormat("HH:mm:ss a");
        saveCurrentTime = currentTime.format(calendar.getTime());

        productRandomKey = saveCurrentDate + saveCurrentTime;

        final StorageReference filePath = ProductImagesRef.child(ImageUri.getLastPathSegment() + productRandomKey + ".mp3");

        final UploadTask uploadTask = filePath.putFile(ImageUri);

        uploadTask.addOnFailureListener(new OnFailureListener() {
            @Override
            public void onFailure(@NonNull Exception e)
            {
                String message = e.toString();
                Toast.makeText(AdminAddNewPodcastActivity.this, "Error: " + message, Toast.LENGTH_SHORT).show();
                loadingBar.dismiss();
            }
        }).addOnSuccessListener(new OnSuccessListener<UploadTask.TaskSnapshot>() {
            @Override
            public void onSuccess(UploadTask.TaskSnapshot taskSnapshot){
                Toast.makeText(AdminAddNewPodcastActivity.this, "Product Image uploaded Successfully...", Toast.LENGTH_SHORT).show();

                Task<Uri> urlTask = uploadTask.continueWithTask(new Continuation<UploadTask.TaskSnapshot, Task<Uri>>() {
                    @Override
                    public Task<Uri> then(@NonNull Task<UploadTask.TaskSnapshot> task) throws Exception
                    {
                        if (!task.isSuccessful())
                        {
                            throw task.getException();
                        }

                        downloadImageUrl = filePath.getDownloadUrl().toString();
                        return filePath.getDownloadUrl();
                    }
                }).addOnCompleteListener(new OnCompleteListener<Uri>() {
                    @Override
                    public void onComplete(@NonNull Task<Uri> task)
                    {
                        if (task.isSuccessful())
                        {
                            downloadImageUrl = task.getResult().toString();

                            Toast.makeText(AdminAddNewPodcastActivity.this, "got the File Url Successfully...", Toast.LENGTH_SHORT).show();

                            SaveProductInfoToDatabase();
                        }
                    }
                });
            }
        });
    }

    private void SaveProductInfoToDatabase()

    {

        HashMap<String, Object> productMap = new HashMap<>();
        productMap.put("category", CategoryName);
        productMap.put("pid", productRandomKey);
        productMap.put("pname", Pname);
        productMap.put("description", Description);
        productMap.put("image", downloadImageUrl);
        productMap.put("time", saveCurrentTime);
        productMap.put("date", saveCurrentDate);



        ProductsRef.child(productRandomKey).updateChildren(productMap)
                .addOnCompleteListener(new OnCompleteListener<Void>() {
                    @Override
                    public void onComplete(@NonNull Task<Void> task)
                    {
                        if (task.isSuccessful())
                        {
                            Intent intent = new Intent(AdminAddNewPodcastActivity.this, AdminCategoryActivity.class);
                            startActivity(intent);

                            loadingBar.dismiss();
                            Toast.makeText(AdminAddNewPodcastActivity.this, "Product is added successfully..", Toast.LENGTH_SHORT).show();
                        }
                        else
                        {
                            loadingBar.dismiss();
                            String message = task.getException().toString();
                            Toast.makeText(AdminAddNewPodcastActivity.this, "Error: " + message, Toast.LENGTH_SHORT).show();
                        }
                    }
                });

    }


}
