#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <memory.h>

#define Nb_max 100
#define Nb_per_combinaison 4
#define Nb_combinaison_max 100

void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge, int Direction) {
    /* Place a bridge on the board at coordinates (pos.x, pos.y) */

    if (Direction % 2) { // If Direction is odd
        if (type_bridge == 0) {
            *(Board + posMax.x * pos.y + pos.x) = '~'; // Place a water bridge ('~') at the specified position
        }

        if (type_bridge == 1) {
            *(Board + posMax.x * pos.y + pos.x) = '-'; // Place a road bridge ('-') at the specified position
        }
    }
    else { // If Direction is even
        if (type_bridge == 0) {
            *(Board + posMax.x * pos.y + pos.x) = '_'; // Place a water bridge ('_') at the specified position
        }

        if (type_bridge == 1) {
            *(Board + posMax.x * pos.y + pos.x) = '.'; // Place a road bridge ('.') at the specified position
        }
    }
};


void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight) {
    /*Place a bridge on the board in (x,y)*/

    *(Board + posMax.x * pos.y + pos.x) = weight + '0';
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

int Is_not_Island(char* Board, Coord pos, Coord posMax) {
    if (*(Board + (posMax.x * (pos.y)) + pos.x) != '*' && *(Board + (posMax.x * (pos.y)) + pos.x) != '~' && *(Board + (posMax.x * (pos.y)) + pos.x) != '-') {
        return 1;
    }
    return 0;
}

int Weigth_Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction) {
    int Island = 0;

    switch (Direction) {
    case(0): // If Direction is 0 (up)
        Next_Coord(&pos, 0); // Move to the next coordinate in the specified direction (up)
        while (pos.y > 0) { // While the y-coordinate is greater than 0
            if (Is_not_Island(Board, pos, posMax)) { // If the position is not an island
                Island = *(Board + (posMax.x * (pos.y)) + pos.x); // Store the value of the position (weight of the island)
                pos.y = 0; // Exit the loop by setting y-coordinate to 0
            }
            Next_Coord(&pos, 0); // Move to the next coordinate in the specified direction (up)
        }
        break;

    case(1): // If Direction is 1 (right)
        Next_Coord(&pos, 1); // Move to the next coordinate in the specified direction (right)
        while (pos.x < posMax.x) { // While the x-coordinate is less than the maximum x-coordinate
            if (Is_not_Island(Board, pos, posMax)) { // If the position is not an island
                Island = *(Board + (posMax.x * (pos.y)) + pos.x); // Store the value of the position (weight of the island)
                pos.x = posMax.x; // Exit the loop by setting x-coordinate to the maximum x-coordinate
            }
            Next_Coord(&pos, 1); // Move to the next coordinate in the specified direction (right)
        }
        break;

    case(2): // If Direction is 2 (down)
        Next_Coord(&pos, 2); // Move to the next coordinate in the specified direction (down)
        while (pos.y < posMax.y) { // While the y-coordinate is less than the maximum y-coordinate
            if (Is_not_Island(Board, pos, posMax)) { // If the position is not an island
                Island = *(Board + (posMax.x * (pos.y)) + pos.x); // Store the value of the position (weight of the island)
                pos.y = posMax.y; // Exit the loop by setting y-coordinate to the maximum y-coordinate
            }
            Next_Coord(&pos, 2); // Move to the next coordinate in the specified direction (down)
        }
        break;

    case(3): // If Direction is 3 (left)
        Next_Coord(&pos, 3); // Move to the next coordinate in the specified direction (left)
        while (pos.x > 0) { // While the x-coordinate is greater than 0
            if (Is_not_Island(Board, pos, posMax)) { // If the position is not an island
                Island = *(Board + (posMax.x * (pos.y)) + pos.x); // Store the value of the position (weight of the island)
                pos.x = 0; // Exit the loop by setting x-coordinate to 0
            }
            Next_Coord(&pos, 3); // Move to the next coordinate in the specified direction (left)
        }
        break;
    }

    return Island; // Return the weight of the island
}


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


int Random(int min, int max) {
    /*Returns a random number between minimum and maximum*/
    int u = (int)((double)rand() / ((double)RAND_MAX + 1) * ((double)max + 1 - (double)min)) + min;
    return(u);
}

Coord Find_Island(char* Board, Coord posMax) {
    Coord pos = { 0, 0 }; // Initialize the position coordinates

    for (int y = 0; y < posMax.y; y++) { // Iterate over the rows of the board
        for (int x = 0; x < posMax.x; x++) { // Iterate over the columns of the board
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.' || *(Board + (posMax.x * y) + x) == '0')) {
                // If the current position is not '*', '~', '-', '_', '.', or '0' (indicating an island)
                pos.x = x; // Store the x-coordinate of the island
                pos.y = y; // Store the y-coordinate of the island
                x = posMax.x; // Exit the loop by setting x to the maximum x-coordinate
                y = posMax.y; // Exit the loop by setting y to the maximum y-coordinate
            }
        }
    }

    return pos; // Return the coordinates of the first island found on the board
}


void Print_board(char* Save, char* Board, Coord Taille) {
    int i = 0;

    for (i; i < (Taille.x * Taille.y); i++) {
        if (Board[i] == '0') { // If the current position on the board is '0'
            printf("%c", Save[i]); // Print the corresponding character from the Save array that is the real island number
        }
        else {
            printf("%c", Board[i]); // Otherwise, print the character from the Board array
        }
    }
}


void Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, int Type_bridge) {
    for (int i = 0; i < Length; i++) {
        Next_Coord(pos, Direction); // Move to the next coordinate in the specified direction
        Place_bridge_on_map(Board, posMax, *pos, Type_bridge, Direction); // Place a bridge on the board at the current position
    }
}


int Length_next_island(char* Board, Coord posMax, Coord pos, int Direction) {
    int space = 0;

    switch (Direction) {
    case(0): // If Direction is 0 (up)
        Next_Coord(&pos, 0); // Move to the next coordinate in the specified direction (up)
        while (pos.y > 0 && *(Board + (posMax.x * (pos.y)) + pos.x) == '*') {
            // While the y-coordinate is greater than 0 and the current position is an island ('*')
            space++; // Increment the length of the bridge segment
            Next_Coord(&pos, 0); // Move to the next coordinate in the specified direction (up)
        }
        break;

    case(1): // If Direction is 1 (right)
        Next_Coord(&pos, 1); // Move to the next coordinate in the specified direction (right)
        while (pos.x < posMax.x && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            // While the x-coordinate is less than the maximum x-coordinate and the current position is an island ('*')
            space++; // Increment the length of the bridge segment
            Next_Coord(&pos, 1); // Move to the next coordinate in the specified direction (right)
        }
        break;

    case(2): // If Direction is 2 (down)
        Next_Coord(&pos, 2); // Move to the next coordinate in the specified direction (down)
        while (pos.y < posMax.y && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            // While the y-coordinate is less than the maximum y-coordinate and the current position is an island ('*')
            space++; // Increment the length of the bridge segment
            Next_Coord(&pos, 2); // Move to the next coordinate in the specified direction (down)
        }
        break;

    case(3): // If Direction is 3 (left)
        Next_Coord(&pos, 3); // Move to the next coordinate in the specified direction (left)
        while (pos.x > 0 && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            // While the x-coordinate is greater than 0 and the current position is an island ('*')
            space++; // Increment the length of the bridge segment
            Next_Coord(&pos, 3); // Move to the next coordinate in the specified direction (left)
        }
        break;
    }

    return space; // Return the length of the bridge segment
}



int Enumeration(char* board, Coord pos, Coord posMax, int* result, int* direction) {
    int weight_island = atoi((board + (posMax.x * pos.y) + pos.x)); // Convert the character at the current position to an integer weight
    int Nb_possibility = 0; // Initialize the number of possibilities

    for (int i = 0; i < 3; i++) { // Iterate over the possible values for direction[0]
        for (int j = 0; j < 3; j++) { // Iterate over the possible values for direction[1]
            for (int k = 0; k < 3; k++) { // Iterate over the possible values for direction[2]
                for (int l = 0; l < 3; l++) { // Iterate over the possible values for direction[3]
                    if (i <= direction[0] && j <= direction[1] && k <= direction[2] && l <= direction[3] && (i + j + k + l) == weight_island) {
                        // If the values i, j, k, l are less than or equal to the corresponding direction values and their sum equals the weight of the island

                        *(result + (Nb_possibility * 4) + 0) = i; // Store i in the result array at the corresponding index
                        *(result + (Nb_possibility * 4) + 1) = j; // Store j in the result array at the corresponding index
                        *(result + (Nb_possibility * 4) + 2) = k; // Store k in the result array at the corresponding index
                        *(result + (Nb_possibility * 4) + 3) = l; // Store l in the result array at the corresponding index
                        Nb_possibility++; // Increment the number of possibilities
                    }
                }
            }
        }
    }

    return Nb_possibility; // Return the number of possibilities
}



void Solver(char* Save, char* Board, Coord posMax, Coord pos, int* Direction, int Nb_bridge) {
    int Direction_available[Nb_per_combinaison]; // Array to store the available directions for each island
    int* result = malloc(sizeof(int) * Nb_per_combinaison * Nb_combinaison_max); // Initialize the result array pointer

    if (result != NULL) {
        if (Direction != NULL) {
            Coord Copy_pos;
            int Type_island = 0;

            for (int i = 0; i < 4; i++) {
                Copy_pos.x = pos.x;
                Copy_pos.y = pos.y;

                if (Direction[i]) {
                    int Length;
                    Type_island += Direction[i];

                    Length = Length_next_island(Board, posMax, pos, i);

                    Create_bridge(Board, posMax, &Copy_pos, Length, i, Direction[i] - 1);

                    Nb_bridge++;

                    Next_Coord(&Copy_pos, i);

                    if ((atoi(Board + (Copy_pos.y * posMax.x) + Copy_pos.x) - Direction[i]) < 0) {
                        return; // If the island weight minus the direction value is negative, exit the function
                    }

                    Place_island_on_map(Board, posMax, Copy_pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Direction[i]);

                    // if Peek_island_number(Board, posMax, Copy_pos, i, 0) - Direction[i] < 0 alors on casse la recursivite
                }
            }

            Place_island_on_map(Board, posMax, pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Type_island);
        }

        int Nb_islands = Island_on_map(Board, pos, posMax);

        if (Nb_islands == 0) {
            Print_board(Save, Board, posMax);
            printf(" ");
            printf("%d ", Nb_bridge);
            return; // If there are no islands left, print the board and the number of bridges used, then exit the function
        }

        pos = Find_Island(Board, posMax);

        for (int i = 0; i < 4; i++) {
            int Space = Length_next_island(Board, posMax, pos, i);

            if (Space) {
                Direction_available[i] = Peek_island_number(Board, posMax, pos, i, Space); // Get the available direction for each island
            }
            else {
                Direction_available[i] = 0;
            }
        }

        int Nb_combinaison = Enumeration(Board, pos, posMax, result, &Direction_available); // Enumerate the possible bridge combinations

        if (Nb_combinaison == 0 && atoi(Board + (pos.y * posMax.x) + pos.x)) {
            return; // If there are no combinations and the current island weight is non-zero, exit the function
        }

        for (int y = 0; y < Nb_combinaison; y++) {
            if (Nb_combinaison == 1) {
                Solver(Save, Board, posMax, pos, result + (Nb_per_combinaison * y), Nb_bridge); // Recursively call the Solver function for the only combination
            }
            else {
                char* Board_copy = (char*)malloc((strlen(Board) + 1) * sizeof(char));

                if (Board_copy != NULL) {
                    memcpy(Board_copy, Board, strlen(Board) + 1);
                }

                Solver(Save, Board_copy, posMax, pos, result + (Nb_per_combinaison * y), Nb_bridge); // Recursively call the Solver function for each combination

                free(Board_copy); // Free the memory allocated for the board copy
            }
        }

        free(result); // Free the memory allocated for the result array
    }

    return;
}



int Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length) {
    switch (Direction) {
    case(0): // If Direction is 0 (up)
        return atoi((Board + (posMax.x * (pos.y - (Length + 1)) + pos.x))); // Return the integer value of the character at the position above the specified length
        break;

    case(1): // If Direction is 1 (right)
        return atoi((Board + (posMax.x * (pos.y) + pos.x + Length + 1))); // Return the integer value of the character at the position to the right of the specified length
        break;

    case(2): // If Direction is 2 (down)
        return atoi((Board + (posMax.x * (pos.y + (Length + 1)) + pos.x))); // Return the integer value of the character at the position below the specified length
        break;

    case(3): // If Direction is 3 (left)
        return atoi((Board + (posMax.x * (pos.y) + pos.x - (Length + 1)))); // Return the integer value of the character at the position to the left of the specified length
        break;
    }
}


void Stock_island(Island* islands, Coord posMax, char* board) {
    int incr = 0; // Initialize the increment variable

    for (int i = 0; i < posMax.x; i++) { // Iterate over the x-axis positions
        for (int j = 0; j < posMax.y; j++) { // Iterate over the y-axis positions
            if (*(board + (posMax.x * j) + i) != '*' && *(board + (posMax.x * j) + i) != '~' && *(board + (posMax.x * j) + i) != '#') {
                // If the character at the current position is not '*', '~', or '#'
                islands[incr].pos.x = i; // Store the x-coordinate of the island in the islands array at the corresponding index
                islands[incr].pos.y = j; // Store the y-coordinate of the island in the islands array at the corresponding index
                islands[incr].number = atoi(board + (posMax.x * j) + i); // Store the island number (converted from the character) in the islands array at the corresponding index
                incr++; // Increment the increment variable
            }
        }
    }
}

