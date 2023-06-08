#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

int Island_on_map(char* Board, Coord pos, Coord posMax) {
    int Island_current = 0;

    for (int y = 0; y < posMax.y; y++) { // Iterate over the rows of the board
        for (int x = 0; x < posMax.x; x++) { // Iterate over the columns of the board
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.' || *(Board + (posMax.x * y) + x) == '0')) {
                // If the current position is not '*', '~', '-', '_', '.', or '0' (indicating an island)
                Island_current++; // Increment the count of islands
            }
        }
    }

    return Island_current; // Return the total number of islands found on the board
};

void Next_Coord(Coord* pos, int direction) {
    /*Modifies the coordinates according to the argument passed as a parameter
    (0:N, 1:E, 2:S, 3:O)*/
    switch (direction) {
    case 0:
        //N
        //pos->x = pos->x;
        pos->y -= 1;
        break;
    case 1:
        //E
        pos->x += 1;
        //pos->y = pos->y;

        break;
    case 2:
        //S
        //pos->x = pos->x;
        pos->y += 1;
        break;
    case 3:
        //O
        pos->x -= 1;
        //pos->y = pos->y;
        break;
    }
}

void Stock_island(Island* islands, Coord posMax, char* board) {
    int incr = 0; // Initialize the increment variable

    for (int i = 0; i < posMax.x; i++) { // Iterate over the x-axis positions
        for (int j = 0; j < posMax.y; j++) { // Iterate over the y-axis positions
            if (*(board + (posMax.x * j) + i) != '*' && *(board + (posMax.x * j) + i) != '~' && *(board + (posMax.x * j) + i) != '_' && *(board + (posMax.x * j) + i) != '.' && *(board + (posMax.x * j) + i) != '-') {
                // If the character at the current position is not '*', '~', or '#'
                islands[incr].pos.x = i; // Store the x-coordinate of the island in the islands array at the corresponding index
                islands[incr].pos.y = j; // Store the y-coordinate of the island in the islands array at the corresponding index
                islands[incr].number = atoi(board + (posMax.x * j) + i); // Store the island number (converted from the character) in the islands array at the corresponding index
                incr++; // Increment the increment variable
            }
        }
    }
}


Coord Find_Bridge(char* Board, Coord posMax) {
    Coord pos = { 0, 0 }; // Initialize the coordinates of the bridge position

    // Iterate over the rows
    for (int y = 0; y < posMax.y; y++) {
        // Iterate over the columns
        for (int x = 0; x < posMax.x; x++) {
            char currentChar = *(Board + (posMax.x * y) + x); // Get the current character in the Board string

            // Check if the current character is a bridge character
            if (currentChar == '~' || currentChar == '-' || currentChar == '_' || currentChar == '.') {
                pos.x = x; // Update the x-coordinate of the bridge position
                pos.y = y; // Update the y-coordinate of the bridge position
                return pos; // Return the bridge position and exit the function
            }
        }
    }

    // If no bridge character is found, return posMax as the default position
    return posMax;
}


int Is_not_in_bridges(Coord pos, Bridge* Bridges, int Nb_bridge) {
    if (Nb_bridge == 0) return 1; // If there are no bridges, the position is not in bridges

    for (int i = 0; i < Nb_bridge; i++) {
        for (int y = 0; y < Bridges[i].length; y++) {
            // Check if the current position matches any position in the bridges
            if (Bridges[i].pos[y].x == pos.x && Bridges[i].pos[y].y == pos.y) {
                return 0; // Position is found in bridges, return 0 (false)
            }
        }
    }

    return 1; // Position is not found in bridges, return 1 (true)
}


void Test(Bridge* Bridges, int Nb) {
    for (int i = 0; i < Nb; i++) {
        Bridges[i].direction = 0; // Set the direction of the current bridge to 0
        Bridges[i].length = 10; // Set the length of the current bridge to 10
        Bridges[i].size = 0; // Set the size of the current bridge to 0
        Bridges[i].pos = NULL; // Set the position array of the current bridge to NULL

        Coord* buffer = (Coord*)malloc(sizeof(Coord) * Bridges[i].length); // Allocate memory for the position array

        if (buffer != NULL) {
            Bridges[i].pos = buffer; // Assign the allocated memory to the position array
        }
        else {
            printf("Erreur d'allocation"); // Print an error message if memory allocation fails
        }
    }
}


void Stock_bridge(Bridge* Bridges, Coord posMax, char* board, int Nb_bridge_max) {
    int Nb_bridge = 0; // Initialize the number of bridges
    Coord pos = { 0, 0 }; // Initialize the position variable

    while (Nb_bridge != Nb_bridge_max) { // Loop until the desired number of bridges is reached

        int direction = 0; // Initialize the direction variable
        int width = 0; // Initialize the width variable
        pos = Find_Bridge(board, posMax); // Find the next bridge position in the board

        // Determine the direction and width based on the character at the bridge position
        if (*(board + (posMax.x * pos.y) + pos.x) == '~') {
            direction = 1;
            width = 1;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '-') {
            direction = 1;
            width = 0;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '_') {
            direction = 0;
            width = 1;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '.') {
            direction = 0;
            width = 0;
        }

        Coord Copy_pos; // Create a copy of the bridge position
        Copy_pos.x = pos.x;
        Copy_pos.y = pos.y;

        if (Is_not_in_bridges(pos, Bridges, Nb_bridge)) { // Check if the bridge position is not already in the bridges array

            if (direction == 0) { // If the direction is horizontal
                if (width == 0) { // If the width is 0
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;

                    int length = 1; // Initialize the length of the bridge

                    Next_Coord(&pos, 2); // Move to the next position in the board

                    // Determine the length of the bridge by counting the consecutive '.' characters
                    while (*(board + (posMax.x * pos.y) + pos.x) == '.') {
                        length++;
                        Next_Coord(&pos, 2);
                    }

                    Bridges[Nb_bridge].length = length; // Set the length of the bridge

                    Bridges[Nb_bridge].pos = NULL; // Set the position array of the bridge to NULL
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length); // Allocate memory for the position array

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer; // Assign the allocated memory to the position array
                    }

                    pos.x = Copy_pos.x; // Restore the original position
                    pos.y = Copy_pos.y;

                    // Populate the position array with the bridge positions and mark them as '*' in the board
                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        if (Bridges[Nb_bridge].pos != NULL) {
                            Bridges[Nb_bridge].pos[i].x = pos.x;
                            Bridges[Nb_bridge].pos[i].y = pos.y;
                            *(board + posMax.x * pos.y + pos.x) = '*';
                            Next_Coord(&pos, 2);
                        }
                    }
                }
                else { // If the width is 1
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;

                    int length = 1; // Initialize the length of the bridge

                    Next_Coord(&pos, 2); // Move to the next position in the board

                    // Determine the length of the bridge by counting the consecutive '_' characters
                    while (*(board + (posMax.x * pos.y) + pos.x) == '_') {
                        length++;
                        Next_Coord(&pos, 2);
                    }

                    Bridges[Nb_bridge].length = length; // Set the length of the bridge

                    Bridges[Nb_bridge].pos = NULL; // Set the position array of the bridge to NULL
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length); // Allocate memory for the position array

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer; // Assign the allocated memory to the position array
                    }

                    pos.x = Copy_pos.x; // Restore the original position
                    pos.y = Copy_pos.y;

                    // Populate the position array with the bridge positions and mark them as '*' in the board
                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        if (Bridges[Nb_bridge].pos != NULL) {
                            Bridges[Nb_bridge].pos[i].x = pos.x;
                            Bridges[Nb_bridge].pos[i].y = pos.y;
                            *(board + posMax.x * pos.y + pos.x) = '*';
                            Next_Coord(&pos, 2);
                        }
                    }
                }
            }
            else { // If the direction is vertical
                if (width == 0) { // If the width is 0
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;

                    int length = 1; // Initialize the length of the bridge

                    Next_Coord(&pos, 1); // Move to the next position in the board

                    // Determine the length of the bridge by counting the consecutive '-' characters
                    while (*(board + (posMax.x * pos.y) + pos.x) == '-') {
                        length++;
                        Next_Coord(&pos, 1);
                    }

                    Bridges[Nb_bridge].length = length; // Set the length of the bridge

                    Bridges[Nb_bridge].pos = NULL; // Set the position array of the bridge to NULL
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length); // Allocate memory for the position array

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer; // Assign the allocated memory to the position array
                    }

                    pos.x = Copy_pos.x; // Restore the original position
                    pos.y = Copy_pos.y;

                    // Populate the position array with the bridge positions and mark them as '*' in the board
                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        if (Bridges[Nb_bridge].pos != NULL) {
                            Bridges[Nb_bridge].pos[i].x = pos.x;
                            Bridges[Nb_bridge].pos[i].y = pos.y;
                            *(board + posMax.x * pos.y + pos.x) = '*';
                            Next_Coord(&pos, 1);
                        }
                    }
                }
                else { // If the width is 1
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;

                    int length = 1; // Initialize the length of the bridge

                    Next_Coord(&pos, 1); // Move to the next position in the board

                    // Determine the length of the bridge by counting the consecutive '~' characters
                    while (*(board + (posMax.x * pos.y) + pos.x) == '~') {
                        length++;
                        Next_Coord(&pos, 1);
                    }

                    Bridges[Nb_bridge].length = length; // Set the length of the bridge

                    Bridges[Nb_bridge].pos = NULL; // Set the position array of the bridge to NULL
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length); // Allocate memory for the position array

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer; // Assign the allocated memory to the position array
                    }

                    pos.x = Copy_pos.x; // Restore the original position
                    pos.y = Copy_pos.y;

                    // Populate the position array with the bridge positions and mark them as '*' in the board
                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        if (Bridges[Nb_bridge].pos != NULL) {
                            Bridges[Nb_bridge].pos[i].x = pos.x;
                            Bridges[Nb_bridge].pos[i].y = pos.y;
                            *(board + posMax.x * pos.y + pos.x) = '*';
                            Next_Coord(&pos, 1);
                        }
                    }
                }
            }

            Nb_bridge += 1; // Increment the number of bridges

        }
    }
}

