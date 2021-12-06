package com.example.podcastv8;

public class Song {
    private String pname,image, pcategory;

    public Song() {
    }

    public Song(String pname, String image, String pcategory) {
        this.pname = pname;
        this.image = image;
        this.pcategory = pcategory;
    }


    public String getpname() {
        return pname;
    }

    public void setpname(String pname) {
        this.pname = pname;
    }


    public String getimage() {
        return image;
    }

    public void setimage(String image) {
        this.image = image;
    }


    public String getPcategory() {
        return pcategory;
    }

    public void setPcategory(String pcategory) {
        this.pname = pcategory;
    }


}