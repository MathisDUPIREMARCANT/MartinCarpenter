#include "Header.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <memory.h>

int main(int argc, char* argv[]) {
    if (argc < 4) {
        printf("Invalid arguments. Usage: program_name <width> <height> <board>\n");
        return 1;
    }

    Coord pos;
    Coord posMax = { atoi(argv[1]), atoi(argv[2]) };

    char* Save = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));
    char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));

    if (Board != NULL && Save != NULL) {
        strncpy_s(Board, argv[3], (strlen(argv[3]) + 1) * sizeof(char), (posMax.x * posMax.y) + 1);
        strncpy_s(Save, argv[3], (strlen(argv[3]) + 1) * sizeof(char), (posMax.x * posMax.y) + 1);
   }
    else {
        printf("Error: Memory allocation failed\n");
        exit(1);
    }

    pos.x = 0;
    pos.y = 0;

    Solver(Save, Board, posMax, pos, NULL, 0);

    free(Save);
    free(Board);

    return 0;
}
