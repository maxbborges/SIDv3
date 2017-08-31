TARGET = Anteprojeto.pdf

BIBTEX = bibtex
LATEX = latex
DVIPS = dvips
PS2PDF = ps2pdf
PDFLATEX = pdflatex
VERSION = 0.1.0

MAIN_FILE = template-anteprojeto-tads.tex
DVI_FILE  = $(addsuffix .dvi, $(basename $(MAIN_FILE)))
AUX_FILE  = $(addsuffix .aux, $(basename $(MAIN_FILE)))
PS_FILE   = $(addsuffix .ps, $(basename $(MAIN_FILE)))
PDF_FILE  = $(addsuffix .pdf, $(basename $(MAIN_FILE)))

SOURCES = $(FIXOS_FILES) $(EDITAVEIS_FILES)

.PHONY: all clean dist-clean

all: 
	@make $(TARGET)
     
	
$(TARGET): $(MAIN_FILE) $(SOURCES) bibliografia.bib
	$(PDFLATEX) $(MAIN_FILE)
	$(BIBTEX) $(AUX_FILE)
	$(PDFLATEX) $(MAIN_FILE)
	$(PDFLATEX) $(MAIN_FILE)
	@mv $(PDF_FILE) $(TARGET)

clean:
	rm -f *~ *.dvi *.ps *.backup *.aux *.log
	rm -f *.lof *.lot *.bbl *.blg *.brf *.toc *.idx
	rm -f *.pdf
	