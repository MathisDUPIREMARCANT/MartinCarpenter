#include <stdio.h>
#include <stdlib.h>


void main() {
	int x; int y;

	char* Board = malloc((x * y) * sizeof(char));

	Init_board_Game(&Board, x, y);


}