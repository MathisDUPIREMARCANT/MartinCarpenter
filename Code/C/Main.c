#include <stdio.h>
#include <stdlib.h>


void main(int argc, char* argv[]) {
	int nombre_iles = *(argv[0]);
	int Xmax = *(argv[1]);
	int Ymax = *(argv[2]);
	int nb_max_liaisons = *(argv[3]);
	char* Board = Init_board_Game(Xmax, Ymax);

	int startx = Random(Xmax-1);
	int starty = Random(Ymax-1);

	

}