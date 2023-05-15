#include <stdio.h>
#include <stdlib.h>


void main(int argc, char* argv[]) {
	int nombre_iles = *(argv[0]);
	int Xmax = *(argv[1]);
	int Ymax = *(argv[2]);
	int nb_max_liaisons = *(argv[3]);
	char* Board = malloc((Xmax * Ymax) * sizeof(char));

	Init_board_Game(&Board, Xmax, Ymax);

	int startx = Random(Xmax);
	int starty = Random(Ymax);



}