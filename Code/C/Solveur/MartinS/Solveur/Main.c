#include "Header.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <memory.h>

int main(int argc, char* argv[]) {
    //if (argc < 4) {
    //    printf("Invalid arguments. Usage: program_name <width> <height> <board>\n");
    //    return 1;
    //}

    Coord pos;
    Coord posMax = { 11, 11 }; // { atoi(argv[1]), atoi(argv[2]) };

    char* Save = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));
    char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));

    if (Board != NULL && Save != NULL) {
        //strncpy_s(Board, argv[3], strlen(argv[3]) + 1, (posMax.x * posMax.y) + 1);
        //strncpy_s(Save, argv[3], strlen(argv[3]) + 1, (posMax.x * posMax.y) + 1);

        strncpy_s(Board, strlen(Board) + 1, "**2*5**2**23**1*2***4***2*5**1**35********5***********************************2*****3*4*3***3***2*****2*4***4*2***3*4***4", (posMax.x * posMax.y) + 1);
        strncpy_s(Save, strlen(Save) + 1, "**2*5**2**23**1*2***4***2*5**1**35********5***********************************2*****3*4*3***3***2*****2*4***4*2***3*4***4", (posMax.x * posMax.y) + 1);
    }
    else {
        printf("Error: Memory allocation failed\n");
        exit(1);
    }

    pos.x = 0;
    pos.y = 0;

    Solver(Save, Board, posMax, pos, NULL, 0);

    return 0;
}
