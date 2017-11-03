package com.example.evan.assign2;

import org.junit.Test;

import java.util.Scanner;

import static org.junit.Assert.*;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

/**
 * Example local unit test, which will execute on the development machine (host).
 *
 * @see <a href="http://d.android.com/tools/testing">Testing documentation</a>
 */
public class ExampleUnitTest {
    @Test
    public void validatePass() throws Exception {
        String pass="DASDa@1DADASDSAD";
        //makes sure all passwords are more than 8 characters
        assertTrue("Message less than 8 characters", pass.length() >= 8);
        //makes sure the password is not equal to password regardless of casing
        assertFalse(pass.equalsIgnoreCase("password"));
        //makes sure that there is at least 1 uppercase letter
        assertTrue(!pass.equals(pass.toLowerCase()));
        //makes sure there is at least one lower case letter
        assertTrue(!pass.equals(pass.toUpperCase()));
        //makes sure the password has a number
        assertTrue(pass.matches(".*\\d.*"));
        //makes sure there is a special character
        assertTrue(pass.matches(".*[@#!$].*"));
    }
}