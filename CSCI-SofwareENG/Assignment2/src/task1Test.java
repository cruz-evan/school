package com.example.evan.assign2;

import org.junit.Test;

import java.util.Scanner;

import static org.junit.Assert.*;

public class ExampleUnitTest {
    @Test
    public void validatePass() throws Exception {
        String pass="dadsadsadasda";
        assertTrue("Message less than 8 characters", pass.length() >= 8);
        assertFalse(pass.equalsIgnoreCase("password"));
    }
}