#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void Solver(char* Board, Coord posMax, Coord pos, int Direction[4]) {

	if (pos == NULL) { pos = { 0,0 }; }

	if (Direction != NULL) {

		Coord Copy_pos;
		
		for (int i = 0; i < 4; i++) {
			Copy_pos.x = pos.x;
			Copy_pos.y = pos.y;

			if (Direction[i]) {
				int Length;

				Length = Length_next_island(Board, posMax, pos, i);

				Create_bridge(Board, posMax, &Copy_pos, Length, i, i%2);

				Next_Coord(&Copy_pos, i);

				Place_island_on_map(Board, posMax, Copy_pos, Direction[i]);
			}
		}
	}
}

Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, Type_bridge) {
	for (int i = 0; i < Length; i++) {
		Next_Coord(&pos, D_pont);
		Place_bridge_on_map(Board, posMax, pos, Type_bridge);
	}
}

Length_next_island(char* Board, Coord posMax, Coord pos, int Direction) {
    int space = 0;
    switch (Direction) {

    case(0):
        Next_Coord(&pos, 0);
        while (pos.y > 0 && *(Board + (posMax.x * (pos.y)) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 0);
        }
        Next_Coord(&pos, 2);
        break;

    case(1):
        Next_Coord(&pos, 1);
        while (pos.x < posMax.x && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 1);
        }
        Next_Coord(&pos, 3);
        break;

    case(2):
        Next_Coord(&pos, 2);
        while (pos.y < posMax.y && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 2);
        }
        Next_Coord(&pos, 0);
        break;

    case(3):
        Next_Coord(&pos, 3);
        while (pos.x > 0 && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 3);
        }
        Next_Coord(&pos, 1);
        break;
    }

    return  space;
}

